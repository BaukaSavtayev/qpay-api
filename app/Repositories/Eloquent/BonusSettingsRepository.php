<?php

namespace App\Repositories\Eloquent;

use App\Models\BonusesSetting;

class BonusSettingsRepository extends BaseRepository implements \App\Repositories\BonusSettingsRepositoryInterface
{
    public function __construct(BonusesSetting $model)
    {
        $this->model = $model;
    }
}
