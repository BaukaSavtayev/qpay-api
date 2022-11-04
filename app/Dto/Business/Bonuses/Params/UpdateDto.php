<?php

namespace App\Dto\Business\Bonuses\Params;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public int $standard_bonus_size;
    public string $activation_start;
    public string $deactivation_start;
}
