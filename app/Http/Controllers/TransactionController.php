<?php

namespace App\Http\Controllers;

use App\Contracts\Transaction as Actions;
use App\Http\Requests\TimeIntervalRequest;
use App\Models\User;


class TransactionController extends Controller
{
    protected User $user;
    public function __construct()
    {
        $this->user = User::where('userable_id', request()->model)->first();
    }
    public function all(TimeIntervalRequest $request)
    {
        return app(Actions\GetAllTransactions::class)->execute($this->user->userable, $request->get('time_interval'));
    }
    public function accrual(TimeIntervalRequest $request)
    {
        return app(Actions\GetAccrualTransactions::class)->execute($this->user->userable, $request->get('time_interval'));
    }
    public function withdrawal(TimeIntervalRequest $request)
    {
        return app(Actions\GetWithdrawalTransactions::class)->execute($this->user->userable, $request->get('time_interval'));
    }
}
