<?php

namespace App\Dto\Business\Employee;


use App\Http\Requests\Business\Employee\UpdateRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateDtoFactory
{

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(UpdateRequest $request): UpdateDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): UpdateDto
    {
        return new UpdateDto([
            'name' => $data['name'],
            'position' => $data['position'],
            'phone_number' => $data['phone_number'],
            'permissions' => $data['permissions'],
            'password' => $data['password'] ?? null,
        ]);
    }
}
