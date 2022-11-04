<?php

namespace App\Contracts\Business\Employee;

use App\Models\Business;
use App\Models\Employee;

interface DeleteEmployee
{
    public function execute(Business $business, Employee $employee): mixed;
}
