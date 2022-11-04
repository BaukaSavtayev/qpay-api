<?php

namespace App\Contracts\Client\Partners;

use App\Models\Client;

interface GetAllPartnersWithBonuses
{
    public function execute(Client $client): mixed;
}
