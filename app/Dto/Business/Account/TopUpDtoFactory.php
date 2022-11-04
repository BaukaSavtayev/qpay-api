<?php

namespace App\Dto\Business\Account;

use App\Http\Requests\Business\Account\TopUpAccountRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class TopUpDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(TopUpAccountRequest $request): TopUpDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): TopUpDto
    {
        return new TopUpDto([
            'amount' => $data['amount'],
            'exp_year_month' => $data['exp_year_month'],
            'pan' => $data['pan'],
            'cvc' => $data['cvc'],
            'card_holder' => $data['card_holder'],
        ]);
    }
}
