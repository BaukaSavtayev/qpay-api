<?php

namespace App\Http\Resources\Business\Account;

use App\Models\Account;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Account  $account
     * @return array
     */
    public function toArray($account): array
    {
        /** @var Account $this */

        return [
            'id' => $this->id,
            'account' => $this->account
        ];
    }
}
