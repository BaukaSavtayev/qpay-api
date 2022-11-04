<?php

namespace App\Dto\Business\Bonuses;

use Spatie\DataTransferObject\DataTransferObject;

class WithdrawalDto extends DataTransferObject
{
    public int $bonus_amount;
    public int $phone_number;
}
