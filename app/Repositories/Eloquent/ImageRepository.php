<?php

namespace App\Repositories\Eloquent;

use App\Models\Image;

class ImageRepository extends BaseRepository implements \App\Repositories\ImageRepositoryInterface
{
    public function __construct(Image $model)
    {
        $this->model = $model;
    }
}
