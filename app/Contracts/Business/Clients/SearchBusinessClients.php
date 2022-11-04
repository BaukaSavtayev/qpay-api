<?php

namespace App\Contracts\Business\Clients;

use App\Models\Business;

interface SearchBusinessClients
{
    public function execute(Business $business, string $name_or_phone_number);
}
