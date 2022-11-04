<?php

namespace App\Http\Resources\Client\Bonuses;

use App\Models\Bonus;

class BonusCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Bonus  $bonuses
     * @return array
     */
    public function toArray($bonuses): array
    {

        return [
            'data' => $this->collection
        ];
    }
}
