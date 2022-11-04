<?php

namespace App\Http\Controllers;

use App\Contracts\Business\City as Actions;
use App\Dto\Business\City\UpdateDtoFactory;
use App\Http\Requests\Business\City\UpdateRequest;
use App\Models\Business;
use App\Models\City;
use App\Http\Resources\Business\City\ResourceCollection;
use App\Http\Resources\Business\City\ShowResource;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show(Request $request)
    {
        return new ResourceCollection(City::all());
    }
//    public function addCity(Request $request)
//    {
//        $cities = explode(',', $request['name']);
//        $cities_arr = [];
//        foreach ($cities as $city)
//            $cities_arr[] = ['name' => $city];
//        return City::insert($cities_arr);
//    }

    public function setCity(Business $business, UpdateRequest $request)
    {
        return app(Actions\SetCity::class)->execute($business,
            UpdateDtoFactory::fromRequest($request)
        );
    }
    public function index(Business $business): mixed
    {
        return new ShowResource($business->city);
    }
}
