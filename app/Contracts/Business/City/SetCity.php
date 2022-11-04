<?php

namespace App\Contracts\Business\City;

use App\Dto\Business\City\UpdateDto;
use App\Models\Business;
use Illuminate\Http\Request;

interface SetCity
{
    public function execute(Business $business, UpdateDto $dto): mixed;
}
