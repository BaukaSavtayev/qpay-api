<?php

namespace App\Http\Resources\Business\Client;

use App\Models\Client;

class ClientsCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Client  $transactions
     * @return array
     */
    public function toArray($transactions): array
    {
        /** @var Client $this */

        return [
            'data' => $this->collection,
        ];
    }

}
