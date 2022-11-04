<?php

namespace App\Contracts\Business\Bonuses;

use App\Dto\Business\Bonuses\WithdrawalDto;
use App\Models\Business;

interface WithdrawalBonuses
{
    public function execute(Business $business, WithdrawalDto $dto): mixed;
}
