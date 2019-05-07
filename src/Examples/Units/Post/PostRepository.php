<?php

namespace DiegoMengarda\LaravelBaseApi\Examples\Units\Post;

use DiegoMengarda\LaravelBaseApi\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    public function model()
    {
        return Post::class;
    }
}
