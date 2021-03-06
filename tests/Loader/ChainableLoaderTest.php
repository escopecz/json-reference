<?php

namespace League\JsonReference\Test\Loader;

use League\JsonReference\Loader\ArrayLoader;
use League\JsonReference\Loader\ChainedLoader;

class ChainableLoaderTest extends \PHPUnit_Framework_TestCase
{
    function test_load_uses_chained_loaders()
    {
        $first  = ['first' => json_decode('{"first": "loader"}')];
        $second = ['second' => json_decode('{"second": "loader"}')];
        $loader = new ChainedLoader(new ArrayLoader($first), new ArrayLoader($second));

        $this->assertEquals($first['first'], $loader->load('first'));
        $this->assertEquals($second['second'], $loader->load('second'));
    }
}
