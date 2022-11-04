<?php

namespace App\Tasks\Client;

use App\Repositories\UserRepositoryInterface;

class SearchTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $business_id, string $name_or_phone_number): mixed
    {
        return $this->repository->findBusinessClientByNameOrPhoneNumber($business_id, $name_or_phone_number);
    }

}
