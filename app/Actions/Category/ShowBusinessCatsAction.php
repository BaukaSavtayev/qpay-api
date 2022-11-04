<?php

namespace App\Actions\Category;

use App\Contracts\Category\ShowBusinessCategories;
use App\Models\Business;
use App\Tasks as Tasks;
class ShowBusinessCatsAction implements ShowBusinessCategories
{
    public function execute(Business $business): array
    {
       return app(Tasks\Category\SortTreelikeTask::class)->run($business->categories);
    }
}
