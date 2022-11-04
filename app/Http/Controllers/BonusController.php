<?php

namespace App\Http\Controllers;

use App\Contracts\Business\Bonuses as Actions;
use App\Dto\Business\Bonuses\AccrualDtoFactory;
use App\Dto\Business\Bonuses\Params\UpdateDtoFactory;
use App\Dto\Business\Bonuses\WithdrawalDtoFactory;
use App\Http\Requests\Business\Bonuses\AccrualRequest;
use App\Http\Requests\Business\Bonuses\Params\UpdateRequest;
use App\Http\Requests\Business\Bonuses\WithdrawalRequest;
use App\Models\Business;
use App\Http\Resources\Business\Bonus\ResourceCollection;


class BonusController extends Controller
{

    public function index(Business $business)
    {
        return new ResourceCollection($business->bonuses);
    }
    public function setBonusesParams(Business $business, UpdateRequest $request): mixed
    {
        return app(Actions\SetBonusesParams::class)->execute($business,
            UpdateDtoFactory::fromRequest($request)
        );
    }

    public function accrual(Business $business, AccrualRequest $request): mixed
    {
        return app(Actions\SendBonus::class)->execute($business,
            AccrualDtoFactory::fromRequest($request)
        );
    }
    public function withdrawal(Business $business, WithdrawalRequest $request): mixed
    {
        return app(Actions\WithdrawalBonuses::class)->execute($business,
            WithdrawalDtoFactory::fromRequest($request)
        );
    }

}
