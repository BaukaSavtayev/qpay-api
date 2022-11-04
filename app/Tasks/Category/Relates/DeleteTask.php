<?php

namespace App\Tasks\Category\Relates;

use App\Repositories\BusinessCategoryRepositoryInterface;

class DeleteTask
{
    private BusinessCategoryRepositoryInterface $repository;

    public function __construct(BusinessCategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $business_id): bool
    {
        return $this->repository->deleteRelates($business_id);
    }
}
