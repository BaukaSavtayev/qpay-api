<?php

namespace App\Repositories\Eloquent;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements \App\Repositories\UserRepositoryInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function findByPhoneNumber(int $phone_number)
    {
        return $this->model
            ->query()
            ->where('phone_number', $phone_number)
            ->first();
    }
    public function findBusinessClientByNameOrPhoneNumber(int $business_id, string $name_or_phone_number)
    {
        return $this->model
            ->query()
            ->join('clients', 'users.userable_id', '=', 'clients.id')
            ->join('bonuses', 'clients.id', '=', 'bonuses.client_id')
            ->where('bonuses.is_active', '=', '1')
            ->where('bonuses.business_id', '=', $business_id)
            ->where('users.name', 'like', "%$name_or_phone_number%")
            ->orWhere('users.phone_number', 'like', "%$name_or_phone_number%")
            ->select('users.name','users.phone_number','clients.id',DB::raw('SUM(bonuses.amount) as bonuses_amount'))
            ->groupBy('clients.id', 'users.name', 'users.phone_number')
            ->get();
    }
}
