<?php

namespace App\Repositories\Eloquent;

use App\Models\City;

class CityRepository extends BaseRepository implements \App\Repositories\CityRepositoryInterface
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
