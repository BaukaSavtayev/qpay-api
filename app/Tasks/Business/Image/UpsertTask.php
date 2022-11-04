<?php

namespace App\Tasks\Business\Image;

use App\Repositories\ImageRepositoryInterface;

class UpsertTask
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
    public function run(array $values, array $uniqueBy, array $update = null): int
    {
        return $this->repository->upsert($values, $uniqueBy, $update);
    }
}
