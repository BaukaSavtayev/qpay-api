<?php

namespace App\Repositories\Eloquent;

use App\Enums\Transactions\Type;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository extends BaseRepository implements \App\Repositories\TransactionRepositoryInterface
{
    /**
     * @param Transaction $model
     */
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $modelId
     * @param $start
     * @param $end
     * @param Type|null $type
     * @return mixed
     */
    public function getByTimeInterval(
        int $modelId,
        $start,
        $end,
        Type $type = null
    )
    {
        $type_condition = !is_null($type) ? " AND tr_type = $type": '';
        return $this->model
            ->whereRaw("(userable_id = $modelId OR recipient = $modelId)" . $type_condition)
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->with(['business','client'])
            ->get();
    }
}
