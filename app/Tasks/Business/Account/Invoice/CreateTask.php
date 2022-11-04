<?php

namespace App\Tasks\Business\Account\Invoice;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class   CreateTask
{
    public function run(array $payload)
    {
        $hashed = Hash::make($payload['payment_id'] . $payload['amount'] . $payload['pan'] . $payload['cvc'] .'123456' , [
            'rounds' => 10,
        ]);
        $response = Http::post('https://api.tarlanpayments.kz/invoice/api-payment', [
            'merchant_id' => '1',
            'amount' => $payload['amount'],
            'card_holder' => $payload['card_holder'],
            'pan' => $payload['pan'],
            'exp_year' => substr($payload['exp_year_month'], 0,2),
            'exp_month' => substr($payload['exp_year_month'], -2),
            'cvc' => $payload['cvc'],
            'user_email' => auth()->user()['email'],
            'description' => 'Test',
            'back_url' => 'http://test.tech/callback',
            'request_url' => 'http://test.tech/',
            'reference_id' => $payload['payment_id'],
            'secret_key' => $hashed,
            'is_test' => true,
        ]);
        return  $response;
    }
}
