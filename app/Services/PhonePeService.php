<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class PhonePeService
{
    protected string $url;
    protected string $merchantId;
    protected string $clientSecret;
    protected int $saltIndex;
    protected string $clientId;
    protected string $tokenUrl;
    protected string $token;




    public function __construct()
    {
        $this->url = config('services.phonepe.url');
        $this->merchantId = config('services.phonepe.merchant_id');
        $this->clientSecret = config('services.phonepe.client_secret');
        $this->saltIndex = (int)(config('services.phonepe.salt_index', 1));
        $this->clientId = config('services.phonepe.client_id');
        $this->tokenUrl = config('services.phonepe.token_url');
        $this->token=$this->generateToken();

    }


   public function generateToken(): ?string
{
    $clientId = $this->clientId;
    $clientSecret = $this->clientSecret;
    $postFields = http_build_query([
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'client_version' => 1,
        'grant_type' => 'client_credentials'
    ]);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $this->tokenUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/x-www-form-urlencoded',
        ],
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        Log::error('PhonePe Token Error: ' . $error);
        return null;
    }

    $data = json_decode($response, true);
    Log::info('PhonePe Token Response:', $data);

    if (isset($data['access_token'])) {
        return $data['access_token'];
    }

    Log::error('PhonePe Token Generation Failed:', $data);
    return null;
}



public function payRequest(array $data): object|null
{
    $orderId = $data['order_id'];
    $amount = $data['amount'] * 100; // convert to paisa
    $redirectUrl = $data['redirect_url'];

    $payload = [
        "merchantOrderId" => $orderId,
        "amount" => $amount,
        "paymentFlow" => [
            "type" => "PG_CHECKOUT",
            "message" => "Payment message used for collect requests",
            "merchantUrls" => [
                "redirectUrl" => $redirectUrl
            ]
        ]
    ];

    $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES);

    $headers = [
        "Content-Type: application/json",
        "Authorization: O-Bearer {$this->token}",
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $this->url.'/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonPayload,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    $response = curl_exec($curl);
    $curlError = curl_error($curl);
    curl_close($curl);

    if ($curlError) {
        Log::error('PhonePe CURL Error: ' . $curlError);
        return null;
    }

    $responseObject = json_decode($response, true);
    Log::info('PhonePe PG_CHECKOUT Response:', $responseObject);

    return (object) $responseObject;
}

public function checkOrderStatus(string $merchantTransactionId): ?object
{
    $statusUrl = "$this->url/order/{$merchantTransactionId}/status?details=false";

    $headers = [
        "Content-Type: application/json",
        "Authorization: O-Bearer {$this->token}",
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $statusUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $headers,
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        Log::error("PhonePe Order Status Error: $error");
        return null;
    }

    $responseData = json_decode($response, true);
    // Log::info("PhonePe Order Status Response:", $responseData);

    return (object) $responseData;
}


}
