<?php

namespace App\Actions\Client\Partners;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class SearchAction implements \App\Contracts\Client\SearchPartners
{

    public function execute(Client $client, string $search_raw)
    {
        $partners = DB::table('businesses')
            ->join('bonuses', 'businesses.id', '=', 'bonuses.business_id')
            ->where('bonuses.is_active', '=', '1')
            ->where('bonuses.client_id', '=', $client->id)
            ->where('businesses.name', 'like', "%$search_raw%")
            ->select('businesses.name','bonuses.business_id',DB::raw('SUM(bonuses.amount) as bonuses_amount'))
            ->groupBy('businesses.name','bonuses.business_id')
            ->get();
        if ($partners)
            return $partners;
        return ['success' => false, 'message' => 'Партнеры не найдены'];
    }
}
