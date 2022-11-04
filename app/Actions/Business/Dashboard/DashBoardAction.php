<?php

namespace App\Actions\Business\Dashboard;

use App\Models\Business;
use App\Tasks as Tasks;
use Illuminate\Database\Eloquent\Collection;

class DashBoardAction
{
    protected $transactions;
    protected $clients;

    public function getTransactions(Business $business)
    {
        if (session()->exists('transactions'))
            $this->transactions =  session()->get('transactions');
        else
        {
            $this->transactions = app(Tasks\Transactions\GetTask::class)->run(['userable_id' => $business->id]);
            $this->setTransactionsCache($this->transactions);
        }
        return $this->transactions;
    }

    public function getClients(Business $business)
    {
        if (session()->exists('clients'))
            $this->clients =  session()->get('clients');
        else
        {

            $this->clients = $business->clients;
            $this->setClientsCache($this->clients);
        }
        return $this->clients;
    }

    public function filterByTimeInterval($models, $start, $end)
    {
        $filt_models = [];
        $start = new \DateTime($start);
        $end = new \DateTime($end);
        foreach ($models as $model){
            $model_created_at = $model->created_at;
            if ($model_created_at > $start && $model_created_at <= $end){
                $filt_models[] = $model;
            }
        }
        return $filt_models;
    }


    public function setTransactionsCache(Collection $transactions)
    {
        session()->put('transactions', $transactions);
    }
    public function setClientsCache(Collection $clients)
    {
        session()->put('transactions', $clients);
    }
}
