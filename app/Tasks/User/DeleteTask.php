<?php

namespace App\Tasks\User;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DeleteTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $user_id): bool
    {
        return $this->repository->delete($user_id);
    }
}
