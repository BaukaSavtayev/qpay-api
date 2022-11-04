<?php

namespace App\Actions\Business\City;

use App\Dto\Business\City\UpdateDto;
use App\Models\Business;
use App\Tasks as Tasks;

class UpdateAction implements \App\Contracts\Business\City\SetCity
{

    public function execute(Business $business, UpdateDto $dto): mixed
    {
        $city = $this->update($dto->toArray(), $business);

        if ($business) return [
            'success' => true,
            'message' => 'Местоположение успешно сохранено'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении'
        ];
    }
    public function update(array $payload, Business $business)
    {
        return app(Tasks\Business\UpdateTask::class)->run($business, $payload);
    }
}
