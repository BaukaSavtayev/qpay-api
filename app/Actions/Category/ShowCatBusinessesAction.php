<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Models\Client;
use App\Tasks as Tasks;

class ShowCatBusinessesAction implements \App\Contracts\Category\ShowCategoryBusinesses
{

    public function execute(Category $category)
    {
        $businesses = $category->businesses->toArray();

        if (auth()->user()->userable_type == Client::class) $businesses = $this->changeBusinessPositions($businesses);
        return $businesses;
    }

    public function changeBusinessPositions(array $businesses): array
    {
        $partners = auth()->user()->userable->partners;
        $partners_ids = [];
        foreach ($partners as $partner)
        {
            $partners_ids[] = $partner->id;
        }

        foreach ($businesses as $key => $business)
        {
            if (in_array($business['id'], $partners_ids))
            {
                $partner = $businesses[$key];
                $bonuses = app(Tasks\Bonuses\GetTask::class)->run(['business_id' => $partner['id'], 'client_id' => auth()->user()->userable_id]);
                $partner = $this->calcBonusesTotal($bonuses, $partner);
                unset($businesses[$key]);
                array_unshift($businesses, $partner);
            }
        }
        return $businesses;
    }

    public function calcBonusesTotal($bonuses, $partner)
    {
        foreach ($bonuses as $bonus)
        {
            if (!array_key_exists('bonuses_total', $partner)) {
                $partner['bonuses_total'] = $bonus->amount;
            } else
            {
                $partner['bonuses_total'] += $bonus->amount;
            }
        }
        return $partner;
    }
}
