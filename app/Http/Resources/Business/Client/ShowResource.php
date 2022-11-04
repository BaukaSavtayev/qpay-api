<?php

namespace App\Http\Resources\Business\Client;

use App\Models\Client;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Client  $client
     * @return array
     */
    public function toArray($account): array
    {
        /** @var Client $this */

        return [
            'id' => $this->id,
            'bonuses' => $this->bonuses,
        ];
    }
}
