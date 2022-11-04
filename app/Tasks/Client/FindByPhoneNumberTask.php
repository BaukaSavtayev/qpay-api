<?php

namespace App\Tasks\Client;

use App\Repositories\ClientRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class FindByPhoneNumberTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $phone_number): mixed
    {
        return $this->repository->findByPhoneNumber($phone_number);
    }
}
