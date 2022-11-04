<?php

namespace App\Repositories;

interface BonusRepositoryInterface extends EloquentRepositoryInterface
{
    public function getBonuses(array $condition);

    public function updateStatus(int $client_id): bool;
}
