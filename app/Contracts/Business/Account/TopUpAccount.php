<?php

namespace App\Contracts\Business\Account;

use App\Dto\Business\Account\TopUpDto;
use App\Models\Business;

interface TopUpAccount
{
    public function execute(Business $business, TopUpDto $dto): mixed;
}
