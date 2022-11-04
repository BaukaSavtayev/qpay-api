<?php

namespace App\Tasks\Bonuses;

use App\Models\Bonus;

class UpdateTask
{
    public function run(Bonus $bonus, array $payload): bool
    {
        return $bonus->update($payload);
    }
}
