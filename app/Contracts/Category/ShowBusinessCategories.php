<?php

namespace App\Contracts\Category;

use App\Models\Business;

interface ShowBusinessCategories
{
    public function execute(Business $business): array;
}
