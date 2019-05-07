<?php

namespace DiegoMengarda\LaravelBaseApi\Tests\Methods;

trait AllTestTraits
{
    use TestIndexTrait,
        TestShowTrait,
        TestSearchTrait,
        TestStoreTrait,
        TestUpdateTrait,
        TestDeleteTrait;
}
