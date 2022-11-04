<?php

namespace App\Contracts\Business\Dashboard;

use App\Models\Business;

interface GetRepeatedSales
{
    public function execute(Business $business, array $time_interval);
}
