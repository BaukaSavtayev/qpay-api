<?php

namespace App\Http\Resources\Business\Transaction;
use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Models\Transaction;

class TransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Transaction  $transactions
     * @return array
     */
    public function toArray($transactions): array
    {
        /** @var Transaction $this */

        return [
            'data' => $this->collection
        ];
    }

}
