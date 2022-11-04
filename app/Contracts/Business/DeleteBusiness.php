<?php

namespace App\Contracts\Business;

interface DeleteBusiness
{
    public function execute(int $id): mixed;
}
