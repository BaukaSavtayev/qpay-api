<?php

namespace App\Tasks\User;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $condition): Model
    {
        return $this->repository->delete($condition);
    }
}
