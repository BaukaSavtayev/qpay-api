<?php

namespace App\Actions\Business\Register;

use App\Contracts\Business\Register\RegisterBusiness;
use App\Dto\Business\Register\RegisterDto;
use App\Models\Business;
use App\Models\User;
use App\Tasks as Tasks;
use Illuminate\Support\Facades\DB;


class RegisterAction implements RegisterBusiness
{

    public function execute(RegisterDto $dto): mixed
    {
        $res = DB::transaction(function () use ($dto){
            $business = $this->createBusiness($dto);
            $user = $this->createUser($dto, $business);
            app(Tasks\Role\RoleSignTask::class)->run($user, 'Business');
            if ($user->userable_id)
                return $business;
            return [
                'success' => false,
                'message' => 'Ошибка при создании бизнес профиля'
            ];
        });

        return $res;
    }

    public function createBusiness(RegisterDto $dto): Business
    {
        return app(Tasks\Business\CreateTask::class)->run($dto->toArray());
    }

    public function createUser(RegisterDto $dto, Business $business): User
    {
        return app(Tasks\User\CreateTask::class)->run($dto->toArray() + ['userable_type' => Business::class, 'userable_id' => $business->id]);
    }

}
