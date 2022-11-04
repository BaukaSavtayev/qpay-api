<?php

namespace App\Http\Resources\Business\Employee;

use App\Models\Client;
use App\Models\Employee;

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
        /** @var Employee $this */

        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'position' => $this->position,
            'phone_number' => $this->user->phone_number,
        ];
    }
}
