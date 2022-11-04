<?php

namespace App\Contracts\Client;

use App\Models\User;
use App\Dto\Client\UpdateDto;

interface ClientUpdate
{
    public function execute(UpdateDto $dto, User $user);
}
