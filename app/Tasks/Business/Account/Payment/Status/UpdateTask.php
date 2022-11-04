<?php

namespace App\Tasks\Business\Account\Payment\Status;


use App\Models\Payment;

class UpdateTask
{
    /**
     * @param Payment $payment
     * @param array $payload
     * @return bool
     */
    public function run(Payment $payment, array $payload): bool
    {
        return $payment->update($payload);
    }
}
