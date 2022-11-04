<?php

namespace App\Contracts\Business\Clients;

use App\Models\Business;
use App\Models\Client;

interface ShowOneClient
{
    public function execute(Business $business, Client $client): mixed;
}
