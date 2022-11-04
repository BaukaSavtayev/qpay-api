<?php

namespace App\Http\Resources\Business\City;

use App\Models\City;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  City $city
     * @return array
     */
    public function toArray($city): array
    {
        /** @var $city $this */

        return [
            'city_id' => $this->id,
            'city' => $this->name,
        ];
    }
}
