<?php

namespace App\Enums\Transactions;

use BenSampo\Enum\Enum;

/**
 *  @method static static ACCRUAL()
 *  @method static static WITHDRAWAL()
 */
class Type extends Enum
{
    const ACCRUAL = '1';
    const WITHDRAWAL = '2';
}
