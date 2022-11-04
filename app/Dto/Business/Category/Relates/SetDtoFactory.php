<?php

namespace App\Dto\Business\Category\Relates;

use App\Http\Requests\Business\Category\SetRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SetDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(SetRequest $request)
    {
        return self::formArray($request->validated());
    }
    /**
     * @throws UnknownProperties
     */
    public static function formArray(array $data): SetDto
    {
        return new SetDto([
           'categories' => array_unique(explode(',', $data['categories']))
        ]);
    }
}
