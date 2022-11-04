<?php

namespace App\Tasks\User;


use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
