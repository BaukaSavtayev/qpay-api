<?php

namespace App\Tasks\Bonuses\Settings;

use App\Repositories\BonusSettingsRepositoryInterface;

class UpsertTask
{
    private BonusSettingsRepositoryInterface $repository;

    public function __construct(BonusSettingsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload, $uniqBy): bool
    {
        return $this->repository->upsert($payload, $uniqBy);
    }
}
