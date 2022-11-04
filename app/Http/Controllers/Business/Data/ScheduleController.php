<?php

namespace App\Http\Controllers\Business\Data;

use App\Actions\Business\Schedule as Actions;
use App\Dto\Business\Schedules\UpdateDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Schedules\UpdateRequest;
use App\Models\Business;
use App\Http\Resources\Business\Schedules\ShowResource;


class ScheduleController extends Controller
{
    public function index(Business $business)
    {
        return new ShowResource($business->schedule);
    }
    public function setSchedule(Business $business, UpdateRequest $request)
    {
        return app(Actions\UpdateAction::class)->execute($business,
            UpdateDtoFactory::fromRequest($request)
        );
    }
    public function getSchedule(int $id): mixed
    {
        return Business::find($id)->schedule;
    }
}
