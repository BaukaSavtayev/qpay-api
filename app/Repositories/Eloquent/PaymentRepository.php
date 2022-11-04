<?php

namespace App\Repositories\Eloquent;


use App\Models\Payment;

class PaymentRepository extends BaseRepository implements \App\Repositories\PaymentRepositoryInterface
{
    public function __construct(Payment $model)
    {
        $this->model = $model;
    }
}
