<?php

namespace App\Dto\Client;
use App\Http\Requests\Client\SetRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(SetRequest $request): UpdateDto
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
            'phone_number' => $data['phone_number'],
            'password' => $data['password'] ?? null
        ]);
    }
}
