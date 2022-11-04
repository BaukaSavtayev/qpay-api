<?php

namespace App\Contracts\User;

use Illuminate\Http\Request;

interface CreateUser
{
    public function execute(Request $request): mixed;
}
