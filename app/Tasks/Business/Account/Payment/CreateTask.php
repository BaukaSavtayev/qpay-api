<?php

namespace App\Tasks\Business\Account\Payment;

use App\Repositories\PaymentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private PaymentRepositoryInterface $repository;

    public function __construct(PaymentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
