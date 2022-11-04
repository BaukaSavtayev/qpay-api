<?php

namespace App\Contracts\Client\Register;

use App\Dto\Client\RegisterDto;

interface RegisterClient
{
    public function execute(RegisterDto $dto): mixed;
}
