<?php

namespace App\Tasks\Bonuses;

use App\Repositories\BonusRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private BonusRepositoryInterface $repository;

    public function __construct(BonusRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
