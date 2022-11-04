<?php

namespace App\Contracts\Business\Dashboard;

use App\Models\Business;

interface GetClientsRatio
{
    public function execute(Business $business): array;
}
