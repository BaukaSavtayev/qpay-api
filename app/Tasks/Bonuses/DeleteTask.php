<?php

namespace App\Tasks\Bonuses;

use App\Repositories\BonusRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DeleteTask
{
    private BonusRepositoryInterface $repository;

    public function __construct(BonusRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $bonus_id): bool
    {
        return $this->repository->delete($bonus_id);
    }
}
