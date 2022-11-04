<?php

namespace App\Contracts\Business\Bonuses;

use App\Dto\Business\Bonuses\Params\UpdateDto;
use App\Models\Business;

interface SetBonusesParams
{
    public function execute(Business $business, UpdateDto $dto): mixed;
}
