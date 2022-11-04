<?php

namespace App\Tasks\Client;

use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;

class CreateTask
{
    private ClientRepositoryInterface $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Client
    {
        return $this->repository->create($payload);
    }
}
