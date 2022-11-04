<?php

namespace App\Tasks\Client\Partners;

use App\Repositories\BusinessRepositoryInterface;

class GetTask
{
    private BusinessRepositoryInterface $repository;

    public function __construct(BusinessRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $client_id)
    {
        return $this->repository->getAllPartnersOfClient($client_id);
    }
}
