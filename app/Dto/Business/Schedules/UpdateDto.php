<?php

namespace App\Dto\Business\Schedules;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public ?string $monday;
    public ?string $tuesday;
    public ?string $thursday;
    public ?string $wednesday;
    public ?string $friday;
    public ?string $saturday;
    public ?string $sunday;
}
