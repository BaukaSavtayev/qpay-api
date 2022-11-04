<?php

namespace App\Repositories\Eloquent;

use App\Models\Schedule;

class ScheduleRepository extends BaseRepository implements \App\Repositories\ScheduleRepositoryInterface
{
    public function __construct(Schedule $model)
    {
        $this->model = $model;
    }
}
