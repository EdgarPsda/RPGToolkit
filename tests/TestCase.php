<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     *  factory()->create();
     *
     *  @param $class
     *  @param array $attributes
     *  @param null $times
     *  @return mixed
     */
    function create($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->create($attributes);
    }

    /**
     * factory()->make();
     *
     * @param $class
     * @param array $attributes
     * @param null $times
     * @return mixed
     */
    public function make($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
