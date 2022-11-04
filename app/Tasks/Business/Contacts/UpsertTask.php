<?php

namespace App\Tasks\Business\Contacts;
use App\Repositories\ContactRepositoryInterface;

class UpsertTask
{
    private ContactRepositoryInterface $repository;

    public function __construct(ContactRepositoryInterface $repository)
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
