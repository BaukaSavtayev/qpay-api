<?php

namespace App\Contracts\Image;

use App\Dto\Image\UpdateDto;

interface SetImage
{
    public function execute(UpdateDto $dto): mixed;
}
