<?php

namespace App\Dto\Business\Register;
use App\Http\Requests\Business\Register\RegisterRequest;
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
            'business_owner_name' => $data['business_owner_name'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
