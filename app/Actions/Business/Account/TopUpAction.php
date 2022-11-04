<?php

namespace App\Actions\Business\Account;

use App\Dto\Business\Account\TopUpDto;
use App\Enums\Payments\Status;
use App\Models\Business;
use App\Models\Payment;
use App\Tasks\Business as Tasks;

class TopUpAction implements \App\Contracts\Business\Account\TopUpAccount
{

    public function execute(Business $business, TopUpDto $dto): mixed
    {
        $payment = $this->createPayment($dto->toArray() + ['business_id' => $business->id, 'status' => Status::PROCESSED()]);
        if ($payment)
        {
            $invoice = $this->createInvoice($dto->toArray() + ['payment_id' => $payment->id]);
            if ($invoice)
            {
                $response_status = $invoice['success'] ?? false;
                $this->setStatus($payment, boolval($response_status));
                if ($response_status)
                {
                    $this->increaseAccount($business, $dto->amount);
                    return [
                        'success' => true,
                        'message' => $invoice['message']
                    ];
                }
                return [
                    'success' => false,
                    'message' => 'Ошибка при проведении платежа'
                ];
            }
        }
        return [
            'success' => false,
            'message' => 'Ошибка при создании платежа'
        ];
    }
    public function createPayment(array $payload)
    {
        return app(Tasks\Account\Payment\CreateTask::class)->run($payload);
    }
    public function createInvoice(array $payload): mixed
    {
        return app(Tasks\Account\Invoice\CreateTask::class)->run($payload);
    }

    public function setStatus(Payment $payment, bool $status): bool
    {
        $status = $status ? Status::SUCCESS(): Status::FAILED();
        return app(Tasks\Account\Payment\Status\UpdateTask::class)->run($payment,['status' => $status]);
    }

    public function increaseAccount(Business $business, int $amount): bool
    {
        $amount += $business->account;
        return app(Tasks\Account\IncreaseTask::class)->run($business, ['account' => $amount]);
    }
}
