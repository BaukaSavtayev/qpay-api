<?php

namespace App\Dto\Business;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public string $name;
    public string $business_owner_name;
    public string $description;
}
