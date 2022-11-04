<?php

namespace App\Tasks\Image;

use App\Repositories\ImageRepositoryInterface;

class UpdateTask
{
    private ImageRepositoryInterface $repository;
    public function __construct(ImageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @param array $values
     * @param array $uniqueBy
     * @param array|null $update
     * @return int
     */
    public function run(array $values, array $uniqueBy, array $update = null): bool
    {
        return $this->repository->upsert($values, $uniqueBy, $update);
    }
}
