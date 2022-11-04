<?php

namespace App\Actions\Business\Clients;

use App\Models\Business;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Tasks as Tasks;

class SearchAction implements \App\Contracts\Business\Clients\SearchBusinessClients
{

    public function execute(Business $business, string $name_or_phone_number)
    {
        $clients = app(Tasks\Client\SearchTask::class)->run($business->id, $name_or_phone_number);
        if ($clients)
            return $clients;
        return ['success' => false, 'message' => 'Клиент не найден'];
    }
}
