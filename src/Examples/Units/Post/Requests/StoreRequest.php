<?php

namespace DiegoMengarda\LaravelBaseApi\Examples\Units\Post\Requests;

use DiegoMengarda\LaravelBaseApi\Requests\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }
}
