<?php

namespace App\Contracts\Business\Categories;

use App\Dto\Business\Category\Relates\SetDto;
use App\Models\Business;

interface SetCategories
{
    public function execute(Business $business, SetDto $dto): mixed;
}
