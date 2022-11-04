<?php

namespace App\Contracts\Business;

use App\Dto\Business\UpdateDto;
use App\Models\Business;

interface UpdateBusiness
{
    public function execute(Business $business, UpdateDto $dto): mixed;
}
