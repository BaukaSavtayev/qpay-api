<?php

namespace App\Dto\Business\Contacts;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public ?int $phone_number;
    public ?string $address;
    public ?string $site_domain;
}
