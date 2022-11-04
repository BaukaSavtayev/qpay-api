<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements \App\Repositories\CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
