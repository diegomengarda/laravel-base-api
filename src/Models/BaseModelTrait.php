<?php

namespace DiegoMengarda\LaravelBaseApi\Models;

trait BaseModelTrait
{
    public function getSearchFillable()
    {
        if (property_exists($this, 'searchFillable')) {
            return $this->searchFillable;
        }

        return $this->fillable;
    }
}
