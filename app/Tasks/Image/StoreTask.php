<?php

namespace App\Tasks\Image;

class StoreTask
{

    public function run($image): string
    {
        $filename = time() . '.' . $image->extension();
        return $image->move(public_path('upload'), $filename);
    }
}
