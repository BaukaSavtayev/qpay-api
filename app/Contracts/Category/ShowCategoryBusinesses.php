<?php

namespace App\Contracts\Category;

use App\Models\Category;

interface ShowCategoryBusinesses
{
    public function execute(Category $category);
}
