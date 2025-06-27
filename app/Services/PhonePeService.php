<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class PhonePeService
{
    protected string $url;
    protected string $merchantId;
    protected string $apiKey;
    protected int $saltIndex;

    public function __construct()
    {
        $this->url = config('services.phonepe.url');
        $this->merchantId = config('services.phonepe.merchant_id');
        $this->apiKey = config('services.phonepe.api_key');
        $this->saltIndex = (int)(config('services.phonepe.salt_index', 1));
    }

    public function payRequest(array $data): object|null
    {
        $orderId = $data['order_id'];
        $paymentData = [
            'merchantId' => $this->merchantId,
            'merchantTransactionId' => $orderId,
            'amount' => $data['amount'] * 100, // Convert to paisa
            'redirectUrl' => $data['redirect_url'],
            'redirectMode' => 'POST',
            'callbackUrl' => $data['redirect_url'],
            'merchantOrderId' => $orderId,
            'mobileNumber' => $data['mobile'],
            'message' => 'Payment for Product/Service',
            'email' => $data['email'],
            'shortName' => $data['name'],
            'paymentInstrument' => [
                'type' => 'PAY_PAGE',
            ],
        ];

        $jsonEncoded = json_encode($paymentData, JSON_UNESCAPED_SLASHES);
        $base64Payload = base64_encode($jsonEncoded);
        $verifyPayload = $base64Payload . "/pg/v2/pay" . $this->apiKey;
        $hashed = hash("sha256", $verifyPayload);
        $xVerifyHeader = "{$hashed}###{$this->saltIndex}";

        $postFields = json_encode(['request' => $base64Payload]);

        $headers = [
            "Content-Type: application/json",
            "X-VERIFY: $xVerifyHeader",
            "accept: application/json",
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        $curlError = curl_error($curl);
        curl_close($curl);

        if ($curlError) {
            Log::error('PhonePe CURL Error: ' . $curlError);
            return null;
        }

        $responseObject = json_decode($response);
        Log::info('PhonePe Response: ', (array) $responseObject);

        return $responseObject;
    }
}
