<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Tasks as Tasks;

class ShowCatsAction implements \App\Contracts\Category\ShowAllCategories
{

    public function execute(): array
    {
        return $this->sortTreelike($this->getAllCategories());
    }

    public function getAllCategories()
    {
        return app(Tasks\Category\GetAllTask::class)->run();
    }

    public function sortTreelike($categories): array
    {
        return app(Tasks\Category\SortTreelikeTask::class)->run($categories);
    }
}
