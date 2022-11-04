<?php

namespace App\Repositories\Eloquent;

use App\Models\BusinessCategory;
use App\Repositories\BusinessCategoryRepositoryInterface;

class BusinessCategoryRepository extends BaseRepository implements BusinessCategoryRepositoryInterface
{

    public function __construct(BusinessCategory $businessCategory)
    {
        $this->model = $businessCategory;
    }


    public function deleteRelates(int $business_id): bool
    {
        return $this->model
            ->query()
            ->where('business_id', $business_id)
            ->delete();
    }

}
