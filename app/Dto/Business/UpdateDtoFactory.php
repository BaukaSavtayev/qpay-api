<?php

namespace App\Dto\Business;

use App\Http\Requests\Business\UpdateRequest;
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
            'business_owner_name' => $data['business_owner_name'],
            'description' => $data['description']
        ]);
    }
}
