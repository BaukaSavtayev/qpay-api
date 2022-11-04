<?php

namespace App\Tasks\Category;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetAllTask
{
    private CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @return Collection
     */
    public function run(): Collection
    {
        return $this->repository->getAll();
    }
}
