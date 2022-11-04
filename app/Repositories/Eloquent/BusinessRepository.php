<?php

namespace App\Repositories\Eloquent;

use App\Models\Business;
use App\Repositories\BusinessRepositoryInterface;
use Illuminate\Support\Facades\DB;


class BusinessRepository extends BaseRepository implements BusinessRepositoryInterface
{
    public function __construct(Business $model)
    {
        $this->model = $model;
    }
    public function getAllPartnersOfClient($client_id)
    {
        return $this->model->query()
            ->join('bonuses', 'businesses.id', '=', 'bonuses.business_id')
            ->where('bonuses.client_id', $client_id)
            ->where('is_active', 1)
            ->select('businesses.id', 'businesses.name', DB::raw('SUM(bonuses.amount) as bonus_amount'))
            ->groupBy('businesses.id', 'businesses.name')
            ->get();
    }
}
