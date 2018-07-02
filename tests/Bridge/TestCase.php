<?php

namespace KunicMarko\GraphQLTest\Tests\Bridge;

use KunicMarko\GraphQLTest\Bridge\TestCaseTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use TestCaseTrait;

    protected static $expectedOperation = 'query';
    protected static $expectedOperationName = '';
    protected static $expectedHeaders = [];

    private function call(
        string $method,
        string $uri,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $headers = []
    ) {
        $this->assertSame('POST', $method);
        $this->assertSame(static::$endpoint, $uri);
        $this->assertArrayHasKey('query', $parameters);
        $this->assertContains(static::$expectedOperation, $parameters['query']);
        $this->assertContains(static::$expectedOperationName, $parameters['query']);
        $this->assertEmpty($files);
        $this->assertEquals(static::$expectedHeaders, $headers);
    }
}
