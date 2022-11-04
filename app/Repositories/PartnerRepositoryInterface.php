<?php

namespace App\Repositories;

use App\Models\Partner;

interface PartnerRepositoryInterface extends EloquentRepositoryInterface
{

    public function firstOrCreate(array $payload): Partner;
}
