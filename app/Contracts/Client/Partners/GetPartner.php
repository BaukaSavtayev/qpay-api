<?php

namespace App\Contracts\Client\Partners;

use App\Models\Business;
use App\Models\Client;

interface GetPartner
{
    public function execute(Client $client, Business $business);
}
