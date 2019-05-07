<?php

namespace DiegoMengarda\LaravelBaseApi\Repositories;

use DiegoMengarda\LaravelBaseApi\Exceptions\GeneralException;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\DeleteTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\GetsTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\OrderByTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\RestoreTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\SearchTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\StoreTrait;
use DiegoMengarda\LaravelBaseApi\Repositories\Traits\UpdateTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    use GetsTrait;
    use StoreTrait;
    use UpdateTrait;
    use SearchTrait;
    use OrderByTrait;
    use DeleteTrait;
    use RestoreTrait;

    abstract public function model();

    private $app;
    private $model;

    /**
     * Get model.
     *
     * @return Builder
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * BaseRepository constructor.
     * @throws GeneralException
     */
    public function __construct()
    {
        $this->app = app();
        $this->makeModel();
    }

    /**
     * makeModel.
     *
     * @return Model
     * @throws GeneralException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new GeneralException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    /**
     * Get one
     *
     * @param int $id
     * @return Model|null
     */
    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @param array|null $orderBy
     * @return Collection
     */
    public function findBy($attribute, $value, $columns = ['*'], $orderBy = null)
    {
        $query = $this->getModel();
        $query = $query->where($attribute, '=', $value)->select($columns);
        $query = $this->orderByFields($query, $orderBy);
        return $query->get();
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @param array|null $orderBy
     * @return Model|null
     */
    public function findOneBy($attribute, $value, $columns = ['*'], $orderBy = null)
    {
        $query = $this->getModel();
        $query = $query->where($attribute, '=', $value)->select($columns);
        $query = $this->orderByFields($query, $orderBy);
        return $query->first();
    }

    /**
     * Custom pagination
     *
     * @param $list
     * @param int $limit
     * @return LengthAwarePaginator|Collection
     */
    public function pagination($list, int $limit = 0)
    {
        if ($limit > 0) {
            return $list->paginate($limit, ['*'], '_page');
        }
        return $list->get();
    }

    /**
     * Get all records by field and multiple values
     *
     * @param string $field
     * @param array $ids
     * @return Collection
     */
    public function getByMultipleValues(string $field = 'id', array $ids = [])
    {
        return $this->getModel()->whereIn($field, $ids)->get();
    }

    /**
     * Remove records by attribute and value
     *
     * @param $attribute
     * @param $value
     * @return boolean
     */
    public function deleteBy($attribute, $value)
    {
        return $this->getModel()->where($attribute, $value)->delete();
    }
}
