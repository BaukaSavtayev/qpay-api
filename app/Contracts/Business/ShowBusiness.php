<?php

namespace App\Contracts\Business;

interface ShowBusiness
{
    public function execute(int $id): mixed;
}
