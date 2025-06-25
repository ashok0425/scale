<?php
namespace App\Http\Controllers;

use App\Models\EmailGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class EmailGroupController extends Controller
{
    public function index()
    {
        $groups = EmailGroup::all();
        return view('emailgroups.index', compact('groups'));
    }

    public function create()
    {
        return view('emailgroups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:email_groups,name',
        ]);

        EmailGroup::create($request->all());

        return redirect()->route('admin.emailgroups.index')->with('success', 'Email group created.');
    }

    public function show(EmailGroup $emailgroup,$id)
    {
        $group=EmailGroup::find($id);

        $emails=Subscriber::whereIn('id',$group->email_ids??[])->paginate(15);
        return view('emailgroups.show', compact('emails'));
    }

    public function edit(EmailGroup $emailgroup)
    {
        return view('emailgroups.edit', compact('emailgroup'));
    }

    public function update(Request $request, EmailGroup $emailgroup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $emailgroup->update($request->all());

        return redirect()->route('admin.emailgroups.index')->with('success', 'Email group updated.');
    }

    public function destroy(EmailGroup $emailgroup)
    {
        $emailgroup->delete();

        return redirect()->route('admin.emailgroups.index')->with('success', 'Email group deleted.');
    }


public function getemails(Request $request)
{
    $emails = Subscriber::when($request->search, function ($query) use ($request) {
        $query->where('email', 'like', '%' . $request->search . '%');
    })->paginate(20);

    // Get all email group data once
    $groups = EmailGroup::all();

    // Add group names to each email
    $emails->getCollection()->transform(function ($email) use ($groups) {
        $emailGroups = [];

        foreach ($groups as $group) {
            $emailIds = is_array($group->email_ids)
                ? $group->email_ids
                : json_decode($group->email_ids, true);

            if (is_array($emailIds) && in_array($email->id, $emailIds)) {
                $emailGroups[] = [
                    'id' => $group->id,
                    'name' => $group->name,
                ];
            }
        }

        $email->groups = $emailGroups;

        return $email;
    });

    return response()->json([
        'emails' => $emails,
        'success' => true
    ]);
}


    public function emails(Request $request){
        $group=EmailGroup::find($request->group_id)??null;
        $groups=EmailGroup::all();
       return view('emailgroups.emails',compact('group','groups'));
    }

    public function addtogroup(Request $request){
        $request->validate([
            'group_id'=>'required|integer|',
            'email_ids'=>'array'
        ]);
       EmailGroup::where('id',$request->group_id)->update([
        'email_ids'=>$request->email_ids
       ]);

       return response()->json([
        'success'=>true,
        'message'=>'Emails Added to group'
       ]);
    }
}
