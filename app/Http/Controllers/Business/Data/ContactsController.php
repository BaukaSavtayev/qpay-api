<?php

namespace App\Http\Controllers\Business\Data;

use App\Contracts\Business\Contacts as Actions;
use App\Dto\Business\Contacts\UpdateDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Contacts\UpdateRequest;
use App\Models\Business;
use App\Http\Resources\Business\Contacts\ShowResource;


class ContactsController extends Controller
{
    public function index(Business $business)
    {
        return new ShowResource($business->contacts);
    }
    public function setContacts(Business $business, UpdateRequest $request)
    {
        return app(Actions\SetContacts::class)->execute($business,
            UpdateDtoFactory::fromRequest($request)
        );
    }

    public function getContacts(int $id): mixed
    {
        return Business::find($id)->contacts;
    }
}
