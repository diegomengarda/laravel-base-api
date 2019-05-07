<?php

namespace DiegoMengarda\LaravelBaseApi\Examples\Tests;

use Illuminate\Foundation\Testing\TestCase;
use DiegoMengarda\LaravelBaseApi\Examples\Units\Post\Post;
use DiegoMengarda\LaravelBaseApi\Tests\BaseApiTest;
use DiegoMengarda\LaravelBaseApi\Tests\Methods\AllTestTraits;

class PostTest extends TestCase
{
    use BaseApiTest;
    use AllTestTraits;

    public function setUp()
    {
        parent::setUp();
        $this->setModelClass(Post::class);
        $this->setEndpoint('v1/post');
        $this->setRequiredFields(['title', 'author', 'active']);
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
