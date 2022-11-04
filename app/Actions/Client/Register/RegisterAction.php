<?php

namespace App\Actions\Client\Register;


use App\Contracts\Client\Register\RegisterClient;
use App\Models\Account;
use App\Models\Client;
use App\Models\User;
use App\Dto\Client\RegisterDto;
use App\Tasks as Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterAction implements RegisterClient
{
    public function execute(RegisterDto $dto): mixed
    {
        $res = DB::transaction(function () use ($dto){

            $client = $this->createClient([]);
            $user = $this->createUser($dto->toArray() + ['userable_id' => $client->id, 'userable_type' => Client::class]);
            app(Tasks\Role\RoleSignTask::class)->run($user, 'Client');
            if ($user->userable) return [$user,'client' => $client];
            return [
                'success' => false,
                'message' => 'Ошибка при создании клиента'
            ];
        });
        return $res;
    }

    public function createClient(array $payload): Client
    {
        return app(Tasks\Client\CreateTask::class)->run($payload);
    }
    public function createUser(array $payload): User
    {
        return app(Tasks\User\CreateTask::class)->run($payload);
    }
}
