<?php

namespace App\Tasks\Business\Schedule;

use App\Repositories\ScheduleRepositoryInterface;

class UpsertTask
{
    private ScheduleRepositoryInterface $repository;

    public function __construct(ScheduleRepositoryInterface $repository)
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
