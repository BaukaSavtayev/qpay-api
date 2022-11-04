<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    /**
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Collection
     */
    public function getAll(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->latest('id')
            ->get();
    }

    /**
     * @param array|string[] $columns
     * @param array $relations
     * @param array $relations_count
     * @return Builder
     */
    public function getAllQuery(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count);
    }

    /**
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Builder
     */
    public function getByCustomFiltersQuery(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->latest('id')
            ->filterBy($filters);
    }

    /**
     * @param string $value
     * @param string|null $key
     * @return array
     */
    public function getList(
        string $value,
        ?string $key,
    ): array
    {
        return $this->model
            ->query()
            ->pluck($value, $key)
            ->toArray();
    }

    /**
     * @param array $filters
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Collection
     */
    public function getByCustomFilters(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->getByCustomFiltersQuery($filters, $columns, $relations, $relations_count)->get();
    }

    /**
     * Find by id.
     *
     * @param string $modelId
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->find($modelId);
    }

    /**
     * Find or fail by id.
     *
     * @param string $modelId
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function findOrFail(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->findOrFail($modelId);
    }

    /**
     * First where.
     *
     * @param array $condition
     * @param array $columns
     * @param array $relations
     * @param array $relations_count
     * @return Model|null
     */
    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->firstWhere($condition);
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): Model
    {
        return $this->model
            ->query()
            ->create($payload);
    }

    /**
     * Update a model by ID.
     *
     * @param string $modelId
     * @param array $payload
     * @return int
     */
    public function update(
        string $modelId,
        array $payload
    ): int
    {
        return $this->model
            ->query()
            ->where('id', $modelId)
            ->update($payload);
    }

    /**
     * @param string $modelId
     * @return bool
     */
    public function delete(
        string $modelId
    ): bool
    {
        return $this->model
            ->query()
            ->where('id', $modelId)
            ->delete();
    }

    /**
     * @param array $condition
     * @return Collection
     */
    public function getWhere(
        array $condition
    ): Collection
    {
        return $this->model
            ->query()
            ->where($condition)
            ->get();
    }

    /**
     * @param $values
     * @return bool
     */
    public function insert($values): bool
    {
        return $this->model
            ->query()
            ->insert($values);
    }

    /**
     * Update any model.
     *
     * @param $values
     * @param $uniqueBy
     * @param null $update
     * @return int
     */
    public function upsert(
        $values,
        $uniqueBy,
        $update = null
    ): int
    {
        return $this->model
            ->query()
            ->upsert($values, $uniqueBy, $update);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->model
            ->query()
            ->count();
    }
}
