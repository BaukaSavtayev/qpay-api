<?php

namespace App\Dto\Business\Bonuses;

use App\Http\Requests\Business\Bonuses\AccrualRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AccrualDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(AccrualRequest $request): AccrualDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): AccrualDto
    {
        return new AccrualDto([
            'purchase_amount' => $data['purchase_amount'],
            'bonus_size' => $data['bonus_size'],
            'client_phone_number' => $data['client_phone_number'],
        ]);
    }
}
