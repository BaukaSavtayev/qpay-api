<?php

namespace App\Dto\Business\Bonuses;

use Spatie\DataTransferObject\DataTransferObject;

class AccrualDto extends DataTransferObject
{
    public int $purchase_amount;
    public int $bonus_size;
    public int $client_phone_number;
    public ?string $comment;
}
