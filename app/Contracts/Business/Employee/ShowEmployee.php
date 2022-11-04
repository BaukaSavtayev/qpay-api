<?php

namespace App\Contracts\Business\Employee;

interface ShowEmployee
{
    public function execute(int $id): mixed;
}
