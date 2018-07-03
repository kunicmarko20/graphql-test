<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\EnumType;
use PHPUnit\Framework\TestCase;

class EnumTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(EnumType $enumType, string $value, string $identifier, string $expected)
    {
        $this->assertAttributeEquals($value, 'value', $enumType);
        $this->assertSame($expected, $enumType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new EnumType('someValue'),
                'someValue',
                'enum',
                'enum: someValue'
            ],
            [
                new EnumType('enum'),
                'enum',
                'fake',
                'fake: enum'
            ],
        ];
    }
}
