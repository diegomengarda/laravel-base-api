<?php

namespace DiegoMengarda\LaravelBaseApi\Examples\Units\Post;

use DiegoMengarda\LaravelBaseApi\Models\BaseAuthModel;

class Post extends BaseAuthModel
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'author',
        'content',
    ];

    protected $searchFillable = [
        'id',
        'title',
        'description',
        'status',
        'author',
        'content',
    ];
}
