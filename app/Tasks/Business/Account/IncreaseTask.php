<?php

namespace App\Tasks\Business\Account;

use App\Models\Business;

class IncreaseTask
{
    /**
     * @param Business $business
     * @param array $payload
     * @return bool
     */
    public function run(Business $business, array $payload): bool
    {
        return $business->update($payload);
    }
}
