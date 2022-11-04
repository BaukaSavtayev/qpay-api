<?php

namespace App\Dto\Business\Employee;

use Spatie\DataTransferObject\DataTransferObject;

class CreateDto extends DataTransferObject
{
    public string $name;
    public string $position;
    public string $phone_number;
    public string $password;

    //PERMISSIONS
    public array $permissions;
}
