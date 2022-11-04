<?php

namespace App\Dto\Business\Employee\ForEmployee;

use App\Http\Requests\Business\Employee\ShortUpdateRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateDtoFactory
{

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(ShortUpdateRequest $request): UpdateDto
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
            'phone_number' => $data['phone_number']
        ]);
    }
}
