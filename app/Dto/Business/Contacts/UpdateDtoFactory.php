<?php

namespace App\Dto\Business\Contacts;

use App\Http\Requests\Business\Contacts\UpdateRequest;
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
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'site_domain' => $data['site_domain']
        ]);
    }
}
