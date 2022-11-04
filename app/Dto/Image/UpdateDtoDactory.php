<?php

namespace App\Dto\Image;

use App\Http\Requests\Image\UpdateRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateDtoDactory
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
            'image' => $data['image'],
        ]);
    }
}
