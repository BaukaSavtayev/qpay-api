<?php

namespace App\Http\Resources\Business\Contacts;

use App\Models\Contact;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Contact $schedule
     * @return array
     */
    public function toArray($contact): array
    {
        /** @var $contact $this */

        return [
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'site' => $this->site
        ];
    }
}
