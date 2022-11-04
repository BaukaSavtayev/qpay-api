<?php

namespace App\Tasks\Bonuses;

use App\Repositories\BonusRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetTask
{
    private BonusRepositoryInterface $repository;

    public function __construct(BonusRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $condition): Collection
    {
        return $this->repository->getBonuses($condition);
    }
}
