<?php

namespace App\Contracts\Business\Register;

use App\Dto\Business\Register\RegisterDto;

interface RegisterBusiness
{
    public function execute(RegisterDto $dto): mixed;
}
