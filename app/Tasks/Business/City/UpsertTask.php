<?php

namespace App\Tasks\Business\City;
use App\Repositories\CityRepositoryInterface;

class UpsertTask
{
    private CityRepositoryInterface $repository;

    public function __construct(CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $values
     * @param array $uniqueBy
     * @param array|null $update
     * @return bool
     */
    public function run(array $values, array $uniqueBy, array $update = null): bool
    {
        return $this->repository->upsert($values, $uniqueBy, $update);
    }
}
