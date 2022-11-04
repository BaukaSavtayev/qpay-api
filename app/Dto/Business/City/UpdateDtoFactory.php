<?php

namespace App\Dto\Business\City;

use App\Http\Requests\Business\City\UpdateRequest;
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
            'city_id' => $data['city_id']
        ]);
    }
}
