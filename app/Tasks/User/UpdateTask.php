<?php

namespace App\Tasks\User;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateTask
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(User $user,array $payload): bool
    {
        return $user->update($payload);
    }
}
