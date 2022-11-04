<?php

namespace App\Contracts\Category;

use Illuminate\Http\Request;

interface CreateCategory
{
    public function execute(Request $request): mixed;
}
