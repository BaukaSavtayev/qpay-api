<?php

namespace App\Contracts\Client;

use App\Models\Client;

interface SearchPartners
{
    public function execute(Client $client, string $search_raw);
}
