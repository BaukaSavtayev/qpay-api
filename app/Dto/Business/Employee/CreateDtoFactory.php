<?php

namespace App\Dto\Business\Employee;


use App\Http\Requests\Business\Employee\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreateDtoFactory
{

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(CreateRequest $request): CreateDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): CreateDto
    {
        return new CreateDto([
            'name' => $data['name'],
            'position' => $data['position'],
            'phone_number' => $data['phone_number'],
            'permissions' => $data['permissions'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
