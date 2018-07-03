<?php

namespace KunicMarko\GraphQLTest\Tests\Operation;

use PHPUnit\Framework\TestCase;

class FakeOperationTest extends TestCase
{
    public function testInvalidFormatter()
    {
        $fakeOperation = new FakeOperation('name');
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Formatter "parameters" not found.');
        $fakeOperation();
    }
}
