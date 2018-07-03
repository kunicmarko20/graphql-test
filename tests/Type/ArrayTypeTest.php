<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\ArrayType;
use PHPUnit\Framework\TestCase;

class ArrayTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(ArrayType $arrayType, array $value, string $identifier, string $expected)
    {
        $this->assertAttributeSame($value, 'value', $arrayType);
        $this->assertAttributeInternalType('array', 'value', $arrayType);
        $this->assertSame($expected, $arrayType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new ArrayType($value = ['one', 'two', '3']),
                $value,
                'array',
                'array: ["one","two","3"]'
            ],
        ];
    }
}
