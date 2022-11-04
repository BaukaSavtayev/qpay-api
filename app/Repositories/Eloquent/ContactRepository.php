<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;

class ContactRepository extends BaseRepository implements \App\Repositories\ContactRepositoryInterface
{
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }
}
