<?php

namespace App\Http\Controllers;

use App\Contracts\Business\Categories as Actions;
use App\Contracts\Category as CatActions;
use App\Dto\Business\Category\Relates\SetDtoFactory;
use App\Http\Requests\Business\Category\SetRequest;
use App\Models\Business;
use App\Models\Category;

class CategoryController extends Controller
{
    public function businessCategories(Business $business): mixed
    {
        return app(CatActions\ShowBusinessCategories::class)->execute($business);
    }
    public function categoryBusinesses(Category $category): mixed
    {
        return app(CatActions\ShowCategoryBusinesses::class)->execute($category);
    }
    public function allCategories()
    {
        return app(CatActions\ShowAllCategories::class)->execute();
    }
    public static function setRelates(Business $business, SetRequest $request)
    {
        return app(Actions\SetCategories::class)->execute($business,
            SetDtoFactory::fromRequest($request)
        );
    }
}
