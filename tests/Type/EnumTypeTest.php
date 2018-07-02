<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\EnumType;
use PHPUnit\Framework\TestCase;

class EnumTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(EnumType $enumType, string $identifier, string $expected)
    {
        $this->assertSame($expected, $enumType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new EnumType('someValue'),
                'enum',
                'enum: someValue'
            ],
            [
                new EnumType('enum'),
                'fake',
                'fake: enum'
            ],
        ];
    }
}
