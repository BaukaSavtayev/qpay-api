<?php

namespace App\Tasks\Category;

class SortTreelikeTask
{
    public function run($categories): array
    {
        foreach ($categories as $category){
            foreach ($categories as $maybe_sub_category){
                if ($category->id == $maybe_sub_category->parent_category){
                    $sub_cats = $category['sub_cats'];
                    $sub_cats[] = $maybe_sub_category;
                    $category['sub_cats'] = $sub_cats;
                }
            }
        }
        $formatted_cats = [];
        foreach ($categories as $category){
            if ($category->parent_category == 0){
                $formatted_cats[] = $category;
            }
        }
        return $formatted_cats;
    }
}
