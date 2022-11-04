<?php

namespace App\Contracts\User;

use Illuminate\Http\Request;

interface UpdateUser
{
    public function execute(Request $request): mixed;
}
