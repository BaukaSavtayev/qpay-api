<?php

namespace App\Contracts\Business\Schedule;

use App\Dto\Business\Schedules\UpdateDto;
use App\Models\Business;


interface setSchedule
{
    public function execute(Business $business, UpdateDto $dto): mixed;
}
