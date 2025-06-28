<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Crm;
use App\Services\PhonePeService;
use Illuminate\Http\Request;
use Log;
use App\Http\Controllers\Controller;
use App\Notifications\PreAccessNotification;
use Illuminate\Support\Facades\Notification;
use Str;

class PriorityAccessController extends Controller
{

      private PhonePeService $phonePeService;
     function __construct(PhonePeService $phonePeService)
    {
        $this->phonePeService = $phonePeService;
    }

public function priorityAccess()
    {
        return view('frontend.form');
    }

    public function storePriorityAccess(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => [
                'required',
                'email'],
            'role' => 'required|in:founder,freelancer,investor,mentor',
            'phone' => 'required|min:10',
            'linkedin' => 'nullable|url',
            'city' => 'required',
            'message' => 'nullable',
            'country' => 'required',
            'terms' => 'accepted',
        ], [
            'full_name.required' => "Mind sharing your name? We’d love to greet you properly.",
            'email.required' => "We’re missing your email — mind sharing it?",
            'email.email' => "That email doesn’t look quite right. Could you check once more?",
            'email.unique' => "You’ve already reserved your spot! If you’re not seeing updates, check your spam folder — or drop us a note, we’ll sort it out.",
            'role.required' => "Who are you building as? Founder, freelancer, investor, or mentor?",
            'role.in' => "Hmm… that doesn't look like a valid role. Choose from founder, freelancer, investor, or mentor.",
            'phone.required' => "Ensure phone number is filled. It helps us verify you're real (and awesome).",
            'phone.min' => "Ensure phone number is 10 digit.",
            'linkedin.url' => "Looks like that link isn’t working — can you check your LinkedIn URL?",
            'city.required' => "Let us know your city — we’re planning meetups, too 😉",
            'message.required' => "Tell us a bit about what you're looking for or expecting — we’re listening!",
            'country.required' => "Where in the world are you building from? Helps us personalize your experience.",
            'terms.accepted' => "Please agree to the Terms to join the movement — we keep it respectful and transparent.",
        ]);


        $page = parse_url(url()->previous(), PHP_URL_PATH);
        $unique_id=uniqid();

        $access = new Crm();
        $access->name = $validated['full_name'];
        $access->email = $validated['email'];
        $access->role = $validated['role'];
        $access->phone = $validated['phone'];
        $access->city = $validated['city'];
        $access->linkedin = $validated['linkedin'];
        $access->message = $validated['message'];
        $access->country = $validated['country'];
        $access->page = $page;
        $access->type = 2;
        $access->payment_status=0;
        $access->unique_id=$unique_id;
        $access->save();
        Notification::route('mail', $request->email)->notify(new PreAccessNotification($access));

     //phone service

     $payload = [
                'name' => $access->name,
                'email' => $access->email,
                'mobile' =>$access->phone,
                'amount' => 399,
                'redirect_url' => route('phonepe.callback',['order_id'=>base64_encode($unique_id),'signature'=> uniqid()]),
                'order_id' =>$unique_id ,
            ];

            $res = $this->phonePeService->payRequest($payload);

            if ($res->redirectUrl) {
               return redirect($res->redirectUrl);
            }

        return back()->with('message', "Welcome to the ScaleDux Family. You're officially one of our Founding Members. You'll
          receive a personal welcome email with your Founding Member kit and exclusive updates
          roadmap.")->with('type', 'success')->with('title', "Thanks for joining!");

    }



    public function phonePeCallback(Request $request)
    {


        $orderId=base64_decode($request->order_id);
       $crm=Crm::where('unique_id',$orderId)->firstOrFail();

    $res = $this->phonePeService->checkOrderStatus($orderId);

    if(!isset($res)){
 return redirect()->route('priority.access')->with('message','Looks like the transaction didn’t go through.
No worries, this can happen for a number of reasons. You can try again in a moment')->with('title','something went wrong with the payment 😕')->with('type', 'success');
    }


        Log::info('Payment Order: ' . $orderId);
        $paymentIntent = Crm::where('unique_id', '=', $orderId)->first();

        if (!$paymentIntent) {
            abort(404, 'Payment failed.');
        }

        if ($res?->state!='COMPLETED') {
            Log::info('Payment Status: ' . $request->get('code'));
            $paymentIntent->payment_status = 2;
            $paymentIntent->save();
          return redirect()->route('priority.access')->with('message','Looks like the transaction didn’t go through.
No worries, this can happen for a number of reasons. You can try again in a moment')->with('title','something went wrong with the payment 😕')->with('type', 'success');
        }


       $crm->payment_status=1;
       $crm->payment_token=$res->paymentDetails[0]['transactionId'];
        $crm->save();

 return redirect()->route('priority.access')->with('title','🎉 Awesome - Payment Successful.
')->with('message','Thank you for securing your Priority Access to ScaleDux. You will receive a confirmation email shortly')->with('type', 'success');
    }


    // public function phonePeSuccess(){

    // }
}
