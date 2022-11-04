<?php

namespace App\Http\Controllers\Business;

use App\Contracts as Actions;
use App\Dto\Business\Account\TopUpDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Account\TopUpAccountRequest;
use App\Models\Business;
use App\Http\Resources as Resources;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * @param Business $business
     * @return Resources\Business\Account\ShowResource
     */
    public function show(Business $business): Resources\Business\Account\ShowResource
    {
        return new Resources\Business\Account\ShowResource($business);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): mixed
    {
        return app(\App\Contracts\Business\Account\CreateAccount::class)->execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAccount(int $id): mixed
    {
        return auth()->user()->userable->account;
    }

    public function topUpAccount(Business $business, TopUpAccountRequest $request): mixed
    {
        return app(Actions\Business\Account\TopUpAccount::class)->execute($business,
            TopUpDtoFactory::fromRequest($request)
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): mixed
    {
        return app(\App\Contracts\Business\Account\UpdateAccount::class)->execute($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): mixed
    {
        return app(\App\Contracts\Business\Account\DeleteAccount::class)->execute($id);
    }
}
