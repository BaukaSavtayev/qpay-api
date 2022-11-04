<?php

namespace App\Contracts\Category;

use Illuminate\Http\Request;

interface UpdateCategory
{
    public function execute(Request $request, int $id): mixed;
}
