<?php

namespace DiegoMengarda\LaravelBaseApi\Examples\Units\Post;

use DiegoMengarda\LaravelBaseApi\Controllers\AbstractController;
use DiegoMengarda\LaravelBaseApi\Controllers\Traits\DeletesTrait;
use DiegoMengarda\LaravelBaseApi\Controllers\Traits\GetsTrait;
use DiegoMengarda\LaravelBaseApi\Controllers\Traits\StoreTrait;
use DiegoMengarda\LaravelBaseApi\Controllers\Traits\UpdateTrait;
use DiegoMengarda\LaravelBaseApi\Examples\Units\Post\Requests\StoreRequest;
use DiegoMengarda\LaravelBaseApi\Examples\Units\Post\Requests\UpdateRequest;
use DiegoMengarda\LaravelBaseApi\Examples\Units\Post\PostRepository as Repository;

class PostController extends AbstractController
{
    use GetsTrait, StoreTrait, UpdateTrait, DeletesTrait;

    public function repo()
    {
        return Repository::class;
    }

    public function storeRequest()
    {
        return StoreRequest::class;
    }

    public function updateRequest()
    {
        return UpdateRequest::class;
    }
}
