<?php

namespace App\Tasks\Partner;

use App\Repositories\PartnerRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private PartnerRepositoryInterface $repository;

    public function __construct(PartnerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->firstOrCreate($payload);
    }
}
