<?php

namespace App\Http\Resources\Business\City;

use App\Models\City;

class ResourceCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  City  $transactions
     * @return array
     */
    public function toArray($cities): array
    {
        /** @var City $this */

        return [
            'data' => $this->collection,
        ];
    }
}
