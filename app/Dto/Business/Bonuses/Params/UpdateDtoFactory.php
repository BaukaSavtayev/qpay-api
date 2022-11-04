<?php

namespace App\Dto\Business\Bonuses\Params;

use App\Http\Requests\Business\Bonuses\Params\UpdateRequest;
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
            'standard_bonus_size' => $data['standard_bonus_size'],
            'activation_start' => $data['activation_start'],
            'deactivation_start' => $data['deactivation_start'],
        ]);
    }
}
