<?php

namespace App\Contracts\Business\Dashboard;

use App\Models\Business;

interface GetCustomerChurn
{
    public function execute(Business $business);
}
