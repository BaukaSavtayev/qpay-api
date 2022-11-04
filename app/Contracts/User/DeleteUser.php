<?php

namespace App\Contracts\User;

interface DeleteUser
{
    public function execute(int $id): mixed;
}
