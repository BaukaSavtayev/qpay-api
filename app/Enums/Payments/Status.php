<?php

namespace App\Enums\Payments;
/**
 *  @method static static PROCESSED()
 *  @method static static SUCCESS()
 *  @method static static FAILED()
 */
class Status extends \BenSampo\Enum\Enum
{
    const FAILED = 0;
    const PROCESSED = 1;
    const SUCCESS = 2;
}
