<?php

namespace App\Contracts\User;

interface ShowUser
{
    public function execute(int $id): mixed;
}
