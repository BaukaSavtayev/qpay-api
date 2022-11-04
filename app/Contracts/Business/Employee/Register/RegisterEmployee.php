<?php

namespace App\Contracts\Business\Employee\Register;

use App\Dto\Business\Employee\CreateDto;

interface RegisterEmployee
{
    public function execute(CreateDto $dto): mixed;
}
