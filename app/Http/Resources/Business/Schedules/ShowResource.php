<?php

namespace App\Http\Resources\Business\Schedules;

use App\Models\Schedule;

class ShowResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Schedule $schedule
     * @return array
     */
    public function toArray($schedule): array
    {
        /** @var $schedule $this */

        return [
            'business_id' => $this->business_id,
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'thursday' => $this->thursday,
            'wednesday' => $this->wednesday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
            'sunday' => $this->sunday,
        ];
    }
}
