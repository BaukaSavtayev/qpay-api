<?php

namespace App\Http\Resources\Business\Bonus;

use App\Models\Bonus;

class ResourceCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Bonus  $bonuses
     * @return array
     */
    public function toArray($bonuses): array
    {
        /** @var Bonus $this */

        $bonuses = [];
        foreach ($this->collection as $bonus){
            $key = 'user_' . strval($bonus->client_id);
            $bonuses[$key][] = $bonus;
        }

        return [
            'data' => $bonuses,
        ];
    }
}
