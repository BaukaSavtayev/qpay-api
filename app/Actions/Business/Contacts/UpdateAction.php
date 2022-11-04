<?php

namespace App\Actions\Business\Contacts;

use App\Dto\Business\Contacts\UpdateDto;
use App\Models\Business;
use App\Tasks as Tasks;

class UpdateAction implements \App\Contracts\Business\Contacts\SetContacts
{

    public function execute(Business $business, UpdateDto $dto): mixed
    {
        $contacts = $this->upsert([['business_id' => $business->id] + $dto->toArray()], ['business_id']);

        if ($contacts) return [
            'success' => true,
            'message' => 'Контактные данные успешно сохранены'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении'
        ];
    }
    public function upsert(array $payload, $uniqBy)
    {
        return app(Tasks\Business\Contacts\UpsertTask::class)->run($payload, $uniqBy);
    }
}
