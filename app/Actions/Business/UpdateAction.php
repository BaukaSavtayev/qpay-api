<?php

namespace App\Actions\Business;

use App\Contracts\Business\UpdateBusiness;
use App\Dto\Business\UpdateDto;
use App\Models\Business;
use App\Tasks as Tasks;

class UpdateAction implements UpdateBusiness
{
    public function execute(Business $business, UpdateDto $dto): mixed
    {

        $res = app(Tasks\Business\UpdateTask::class)->run($business, $dto->toArray());
        if (!$res)
            return ['success' => false, 'message' => 'Ошибка при изменении'];
        return ['success' => true, 'message' => 'Изменения сохранены'];
    }
}
