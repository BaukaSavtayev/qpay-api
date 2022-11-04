<?php

namespace App\Contracts\Business\Contacts;

use App\Dto\Business\Contacts\UpdateDto;
use App\Models\Business;

interface SetContacts
{
    public function execute(Business $business, UpdateDto $dto): mixed;
}
