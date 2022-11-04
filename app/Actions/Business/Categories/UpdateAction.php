<?php

namespace App\Actions\Business\Categories;

use App\Dto\Business\Category\Relates\SetDto;
use App\Models\Business;
use App\Tasks as Tasks;
use Illuminate\Database\Eloquent\Collection;


class UpdateAction implements \App\Contracts\Business\Categories\SetCategories
{
    public function execute(Business $business, SetDto $dto): mixed
    {
        $this->deleteRelates($business->id);
        if ($dto->categories != 0){
            $all_cats = $this->getAllCategories();
            $categories = $this->getAllCatsValuesRaw($all_cats, $dto->categories, $business->id);
            $res = $this->setRelates($categories);
        }

        if ($res) return [
            'success' => true,
            'message' => 'Категории успешно сохранены'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении'
        ];
    }

    public function setRelates(array $category_ids)
    {
        return app(Tasks\Category\Relates\SetTask::class)->run($category_ids);
    }

    public function deleteRelates(int $business_id): bool
    {
        return app(Tasks\Category\Relates\DeleteTask::class)->run($business_id);
    }

    public function getAllCategories()
    {
        return app(Tasks\Category\GetAllTask::class)->run();
    }
    public function getAllCatsValuesRaw(Collection $all_cats, array $cats_ids, int $business_id): array
    {
        $all_set_cats_ids = $this->allParentAndChild($all_cats, $cats_ids);
        $values = [];
        foreach ($all_set_cats_ids as $category_id)
            $values[] = ['category_id' => $category_id, 'business_id' => $business_id];

        return $values;
    }

    public function allParentAndChild($all_cats, $cats_ids, $number_of_iterations = 0): array
    {
        while (count($all_cats) != $number_of_iterations){
            foreach ($all_cats as $cat){
                if (in_array($cat->parent_category, $cats_ids) || in_array($cat->id, $cats_ids))
                {
                    $cats_ids[] = $cat->parent_category ?? false;
                }
            }
            $number_of_iterations++;
        }
        foreach ($cats_ids as $key => $cat_id){
            if (!$cat_id) unset($cats_ids[$key]);
        }
        return array_unique($cats_ids);
    }
}
