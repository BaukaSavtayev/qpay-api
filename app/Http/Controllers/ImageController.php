<?php

namespace App\Http\Controllers;
use App\Contracts\Image as Actions;
use App\Dto\Image\UpdateDtoDactory;
use App\Http\Requests\Image\UpdateRequest;
use App\Http\Resources\Business\Image\ShowResource;

class ImageController extends Controller
{
    public function setProfileImage(UpdateRequest $request)
    {
        return app(Actions\SetImage::class)->execute(
            UpdateDtoDactory::fromRequest($request)
        );
    }

    public function getProfileImage()
    {
        return new ShowResource(auth()->user()->userable->image);
    }
}
