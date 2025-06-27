<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhonePeService
{


    protected  $url;
    protected  $merchantId;
    protected  $apiKey;


    public function __construct()
    {

        $this->url = config('services.phonepe.url');
        $this->merchantId = config('services.phonepe.merchant_id');
        $this->apiKey = config('services.phonepe.api_key');
    }


    public function payRequest($data)
    {

        $order_id = $data['order_id'];
        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $amount = $data['amount']; // amount in INR
        $description = 'Payment for Product/Service';
        $redirectUrl = $data['redirect_url'];
        // dd($this->merchantId);

        $paymentData = array(
            'merchantId' => $this->merchantId,
            'merchantTransactionId' => $order_id,
            'amount' => $amount * 100,
            'redirectUrl' => $redirectUrl,
            'redirectMode' => "POST",
            'callbackUrl' => $redirectUrl,
            "merchantOrderId" => $order_id,
            "mobileNumber" => $mobile,
            "message" => $description,
            "email" => $email,
            "shortName" => $name,
            "paymentInstrument" => array(
                "type" => "PAY_PAGE",
            )
        );


        $jsonencode = json_encode($paymentData);
        $payloadMain = base64_encode($jsonencode);
        $salt_index = 1;
        $payload = $payloadMain . "/pg/v1/pay" . $this->apiKey;
        $sha256 = hash("sha256", $payload);
        $final_x_header = $sha256 . '###' . $salt_index;
        $request = json_encode(array('request' => $payloadMain));

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-VERIFY: " . $final_x_header,
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $res = json_decode($response);
           Log::info([$res]);
        return $res;
    }


}


