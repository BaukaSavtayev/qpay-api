<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function create(array $payload): Model;
    public function findByPhoneNumber(int $phone_number);
    public function findBusinessClientByNameOrPhoneNumber(int $business_id, string $name_or_phone_number);
}
