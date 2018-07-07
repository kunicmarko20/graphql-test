<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\ArrayType;
use PHPUnit\Framework\TestCase;

class ArrayTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(array $values, string $identifier, string $expected)
    {
        $this->assertSame($expected, (new ArrayType($values))($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                ['one', 'two', '3'],
                'array',
                'array: ["one","two","3"]'
            ],
            [
                [],
                'array2',
                'array2: []'
            ],
        ];
    }
}
