<?php

namespace KunicMarko\GraphQLTest\Bridge\Lumen;

use KunicMarko\GraphQLTest\TestCaseTrait;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    use TestCaseTrait;
}
