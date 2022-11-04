<?php

namespace App\Repositories;

interface BusinessRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllPartnersOfClient($client_id);
}
