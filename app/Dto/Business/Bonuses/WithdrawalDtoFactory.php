<?php

namespace App\Dto\Business\Bonuses;

use App\Http\Requests\Business\Bonuses\WithdrawalRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class WithdrawalDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(WithdrawalRequest $request): WithdrawalDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): WithdrawalDto
    {
        return new WithdrawalDto([
            'bonus_amount' => $data['bonus_amount'],
            'phone_number' => $data['phone_number'],
        ]);
    }
}
