<?php

namespace App\Tasks\Bonuses;

use App\Repositories\BonusRepositoryInterface;

class UpdateStatusTask
{
    private BonusRepositoryInterface $repository;

    public function __construct(BonusRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function run(int $client_id): bool
    {
        return $this->repository->updateStatus($client_id);
    }
}
