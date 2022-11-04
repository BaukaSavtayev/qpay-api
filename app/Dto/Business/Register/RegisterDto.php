<?php

namespace App\Dto\Business\Register;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $business_owner_name;
    public string $phone_number;
    public string $password;
}
