<?php

namespace App\Actions\Client\Partners;

use App\Contracts\Client\Partners\GetAllPartnersWithBonuses;
use App\Models\Client;
use App\Tasks as Tasks;

class GetAction implements GetAllPartnersWithBonuses
{
    public function execute(Client $client): mixed
    {
        return app(Tasks\Client\Partners\GetTask::class)->run($client->id);
    }
}
