<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\ArrayType;
use PHPUnit\Framework\TestCase;

class ArrayTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(ArrayType $arrayType, string $identifier, string $expected)
    {
        $this->assertSame($expected, $arrayType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new ArrayType(['one', 'two', '3']),
                'array',
                'array: ["one","two","3"]'
            ],
        ];
    }
}
