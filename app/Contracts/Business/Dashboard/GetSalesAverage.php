<?php

namespace App\Contracts\Business\Dashboard;

use App\Models\Business;

interface GetSalesAverage
{
    public function execute(Business $business, array $time_interval);
}
