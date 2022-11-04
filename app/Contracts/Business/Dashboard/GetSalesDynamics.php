<?php

namespace App\Contracts\Business\Dashboard;

use App\Models\Business;

interface GetSalesDynamics
{
    public function execute(Business $business, array $time_interval): array;
}
