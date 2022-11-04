<?php

namespace App\Repositories;

interface BusinessCategoryRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param array $cats_ids
     * @param int $business_id
     * @return mixed
     */
    public function deleteRelates(int $business_id): mixed;
}
