<?php

namespace KunicMarko\GraphQLTest\Bridge\Laravel;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use KunicMarko\GraphQLTest\TestCaseTrait;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    use TestCaseTrait;
}
