<?php

namespace App\Enums\Transactions;
/**
 *  @method static static IN_PROCESSING()
 *  @method static static SUCCESS()
 *  @method static static FAILED()
 */
class Status extends \BenSampo\Enum\Enum
{
    const IN_PROCESSING = '1';
    const SUCCESS = '2';
    const FAILED = '3';
}
