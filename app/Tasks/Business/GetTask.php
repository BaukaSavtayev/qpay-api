<?php

namespace App\Tasks\Business;

use App\Repositories\BusinessRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetTask
{
    private BusinessRepositoryInterface $repository;

    public function __construct(BusinessRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $condition, array $relations): Model
    {
        return $this->repository->firstWhere($condition, relations: $relations);
    }
}
