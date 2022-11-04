<?php

namespace App\Http\Controllers\User;

use App\Contracts\Business as BusinessActions;
use App\Contracts\Client as ClientActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Register\RegisterRequest as BusinessRegisterRequest;
use App\Http\Requests\Client\Register\RegisterRequest as ClientRegisterRequest;
use App\Dto as Dto;

class RegisterController extends Controller
{

    /**
     * @param BusinessRegisterRequest $request
     * @return mixed
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */

    public function registerBusiness(BusinessRegisterRequest $request): mixed
    {
        return app(BusinessActions\Register\RegisterBusiness::class)->execute(
            \App\Dto\Business\Register\RegisterDtoFactory::fromRequest($request)
        );
    }

    /**
     * @param ClientRegisterRequest $request
     * @return mixed
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */

    public function registerClient(ClientRegisterRequest $request): mixed
    {
        return app(ClientActions\Register\RegisterClient::class)->execute(
            Dto\Client\RegisterDtoFactory::fromRequest($request)
        );
    }

}
