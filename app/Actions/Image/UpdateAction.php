<?php

namespace App\Actions\Image;

use App\Dto\Image\UpdateDto;
use App\Tasks as Tasks;


class UpdateAction implements \App\Contracts\Image\SetImage
{
    public function execute(UpdateDto $dto): mixed
    {
        $user = auth()->user();
        $image_path = $this->storeImage($dto->image);
        $image = $this->updateImage(
            ['url' => $image_path, 'imageable_type' => $user->userable_type, 'imageable_id' => $user->userable_id],
            ['imageable_type', 'imageable_id'],
            ['url']
        );
        if ($image) return [
            'success' => true,
            'message' => 'Изображение успешно сохранено'
        ];
        return [
            'success' => false,
            'message' => 'Ошибка при сохранении изображение'
        ];
    }

    public function updateImage(array $values, array $uniqBy, array $update = null): bool
    {
        return app(Tasks\Image\UpdateTask::class)->run($values, $uniqBy, $update);
    }
    public function storeImage($image): string
    {
        return app(Tasks\Image\StoreTask::class)->run($image);
    }
}
