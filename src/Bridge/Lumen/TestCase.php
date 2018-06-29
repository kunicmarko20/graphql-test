<?php

namespace KunicMarko\GraphQLTest\Bridge\Lumen;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use KunicMarko\GraphQLTest\Operation\TestCaseTrait;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    use TestCaseTrait;
}
