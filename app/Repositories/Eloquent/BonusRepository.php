<?php

namespace App\Repositories\Eloquent;

use App\Enums\Bonuses\Status;
use App\Models\Bonus;
use App\Repositories\BonusRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BonusRepository extends BaseRepository implements BonusRepositoryInterface
{
    public function __construct(Bonus $model)
    {
        $this->model = $model;
    }
    public function getBonuses(array $condition)
    {
        return $this->model
            ->query()
            ->where($condition)
            ->where('deactivation_start', '>', now())
            ->orderBy('deactivation_start')
            ->get();
    }
    public function updateStatus(int $client_id): bool
    {
        $sqlRaw = "UPDATE bonuses SET is_active = IF(activation_start < ? && deactivation_start > ?, ?, ?) WHERE client_id = ?";
        return DB::update($sqlRaw, [now(), now(), 1, 0, $client_id]);
    }

}
