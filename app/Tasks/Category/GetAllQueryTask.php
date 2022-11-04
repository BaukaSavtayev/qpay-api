<?php

namespace App\Tasks\Category;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class GetAllQueryTask
{
    private CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Builder
     */
    public function run(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder
    {

        return $this->repository->getAllQuery(
            $columns, $relations, $relations_count
        );
    }
}
