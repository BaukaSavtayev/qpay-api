<?php

namespace App\Repositories\Eloquent;

use App\Models\Partner;

class PartnerRepository extends BaseRepository implements \App\Repositories\PartnerRepositoryInterface
{
    public function __construct(Partner $model)
    {
        $this->model = $model;
    }

    public function firstOrCreate(array $payload): Partner
    {
        return $this->model
            ->query()
            ->firstOrCreate($payload);
    }
}
