<?php

namespace App\Actions\Client;

use App\Models\User;
use App\Dto\Client\UpdateDto;

class UpdateAction implements \App\Contracts\Client\ClientUpdate
{

    public function execute(UpdateDto $dto, User $user)
    {
        $user->name = $dto->name;
        $user->phone_number = $dto->phone_number;
        $user->save();
        return $user;

    }
}
