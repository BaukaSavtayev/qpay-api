<?php

namespace App\Enums\UserModels;
use App\Models\Business;
use App\Models\Client;
use App\Models\Employee;

/**
 *  @method static static BUSINESS()
 *  @method static static CLIENT()
 *  @method static static Employee()
 */
class Kind extends \BenSampo\Enum\Enum
{
    const BUSINESS = Business::class;
    const CLIENT = Client::class;
    const EMPLOYEE = Employee::class;
}
