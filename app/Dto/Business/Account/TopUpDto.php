<?php

namespace App\Dto\Business\Account;

class TopUpDto extends \Spatie\DataTransferObject\DataTransferObject
{
    public $amount;
    public $card_holder;
    public $exp_year_month;
    public $pan;
    public $cvc;
}
