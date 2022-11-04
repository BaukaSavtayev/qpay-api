<?php

namespace App\Tasks\Business;

use App\Models\Business;

class UpdateTask
{
    public function run(Business $business, array $payload): bool
    {
        return $business->update($payload);
    }
}
