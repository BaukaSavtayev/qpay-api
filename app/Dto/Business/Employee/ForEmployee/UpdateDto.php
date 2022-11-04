<?php

namespace App\Dto\Business\Employee\ForEmployee;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public string $name;
    public string $phone_number;
    public ?string $password;
}
