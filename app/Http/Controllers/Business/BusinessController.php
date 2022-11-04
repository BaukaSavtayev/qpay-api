<?php

namespace App\Http\Controllers\Business;

use App\Contracts\Business as Actions;
use App\Dto\Business\UpdateDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\UpdateRequest;
use App\Models\Business;


class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('role:Business')->except(['store']);
        // OR
        //$this->middleware('auth')->only(['store','update','edit','create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //resource
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Business $business, UpdateRequest $request)
    {
        return app(Actions\UpdateBusiness::class)->execute($business,
            UpdateDtoFactory::fromRequest($request)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $id = auth()->user()->userable_id;
        return app(Actions\DeleteBusiness::class)->execute($id);
    }
}
