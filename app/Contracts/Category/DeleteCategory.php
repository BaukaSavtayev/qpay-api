<?php

namespace App\Contracts\Category;

interface DeleteCategory
{
    public function execute(int $id): mixed;
}
