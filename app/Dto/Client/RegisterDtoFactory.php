<?php

namespace App\Dto\Client;

use App\Http\Requests\Client\Register\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): RegisterDto
    {
        return new RegisterDto([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
