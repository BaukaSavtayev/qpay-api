<?php

namespace App\Actions\Business\Schedule;

use App\Dto\Business\Schedules\UpdateDto;
use App\Models\Business;
use App\Tasks as Tasks;

class UpdateAction implements \App\Contracts\Business\Schedule\setSchedule
{

    public function execute(Business $business, UpdateDto $dto): mixed
    {

        $res = $this->upsert([['business_id' => $business->id] + $dto->toArray()], ['business_id']);
        if ($res) return [
            'success' => true,
            'message' => 'График работы успешно сохранен'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении'
        ];
    }

    public function upsert(array $payload, $uniqby)
    {
        return app(Tasks\Business\Schedule\UpsertTask::class)->run($payload, $uniqby);
    }
}
