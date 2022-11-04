<?php

namespace App\Http\Controllers;

use App\Contracts\Client as Actions;
use App\Http\Requests\Client\SearchPartnersRequest;
use App\Models\Business;
use App\Models\Client;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('');
    }
    public function partner(Client $client, Business $business)
    {
        return  app(Actions\Partners\GetPartner::class)->execute($client, $business);
    }
    public function partners(Client $client)
    {
        return app(Actions\Partners\GetAllPartnersWithBonuses::class)->execute($client);
    }

    public function searchPartners(Client $client, SearchPartnersRequest $request)
    {
        return app(Actions\SearchPartners::class)->execute($client, $request->get('name'));
    }

    public function partnerBonuses(Client $client, Business $business)
    {
        return app(Actions\Partners\GetPartner::class)->execute($client, $business);
    }

}
