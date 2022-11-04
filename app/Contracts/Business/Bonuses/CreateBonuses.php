<?php

namespace App\Contracts\Business\Bonuses;

use App\Dto\Business\Bonuses\AccrualDto;
use App\Models\Business;

interface CreateBonuses
{
    public function execute(Business $business,AccrualDto $dto): mixed;
}
