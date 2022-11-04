<?php

namespace App\Actions\Business\Bonuses;

use App\Dto\Business\Bonuses\Params\UpdateDto;
use App\Models\Business;
use App\Tasks as Tasks;

class UpdateAction implements \App\Contracts\Business\Bonuses\SetBonusesParams
{
    public function execute(Business $business, UpdateDto $dto): mixed
    {

        $bonus_settings = app(Tasks\Bonuses\Settings\UpsertTask::class)->run([['business_id' => $business->id] + $dto->toArray()], ['business_id']);

        if ($bonus_settings) return [
            'success' => true,
            'message' => 'Настройки бонусов успешно сохранены'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении'
        ];
    }
}
