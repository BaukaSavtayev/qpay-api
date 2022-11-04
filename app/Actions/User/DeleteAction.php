<?php

namespace App\Actions\User;

use App\Models\User;

class DeleteAction implements \App\Contracts\User\DeleteUser
{

    public function execute(int $id): mixed
    {
        if (User::destroy($id)){
            return [
                'success' => true,
                'message' => 'Пользователь удален'
            ];
        };
        return [
            'success' => false,
            'message' => 'Не удалось удалить пользователя'
        ];
    }
}
