<?php

namespace App\Http\Resources\Business\Image;

use App\Models\Image;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Image $schedule
     * @return array
     */
    public function toArray($image): array
    {
        /** @var $image $this */

        return [
            'id' => $this->id,
            'image' => $this->url
        ];
    }
}
