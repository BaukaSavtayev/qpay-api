<?php

namespace App\Tasks\Category\Relates;

use App\Repositories\BusinessCategoryRepositoryInterface;
use App\Repositories\Eloquent\BusinessRepository;

class SetTask
{
    private BusinessCategoryRepositoryInterface $repository;

    public function __construct(BusinessCategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): bool
    {
        return $this->repository->insert($payload);
    }
}
