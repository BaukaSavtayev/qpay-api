<?php

namespace App\Http\Controllers\Client;

use App\Contracts as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Client\SearchClientRequest;
use App\Http\Requests\Client\SetRequest;
use App\Models\Business;
use App\Models\Client;
use App\Http\Resources\Business\Client\ClientsCollection;
use App\Dto\Client\UpdateDtoFactory;

class ClientsController extends Controller
{
    public function index(Client $client)
    {
        return $client->user;
    }
    public function update(Client $client, SetRequest $request)
    {
        return app(Actions\Client\ClientUpdate::class)->execute(
            UpdateDtoFactory::fromRequest($request), $client->user
        );
    }
    public function businessClient(Business $business, Client $client)
    {
        return app(Actions\Business\Clients\ShowOneClient::class)->execute($business, $client);
    }
    public function businessClients(Business $business)
    {
        return new ClientsCollection($business->clients);
    }
    public function searchBusinessClients(Business $business, SearchClientRequest $request)
    {
        return app(Actions\Business\Clients\SearchBusinessClients::class)->execute($business, $request->get('name_or_phone_number'));
    }
}
