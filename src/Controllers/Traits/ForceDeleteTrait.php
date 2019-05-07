<?php

namespace DiegoMengarda\LaravelBaseApi\Controllers\Traits;

trait ForceDeleteTrait
{
    /**
     * Force Delete :item.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function forceDelete(int $id)
    {
        return $this->getRepo()->forceDelete($id);
    }
}
