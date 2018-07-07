<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\EnumType;
use PHPUnit\Framework\TestCase;

class EnumTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(string $value, string $identifier, string $expected)
    {
        $this->assertSame($expected, (new EnumType($value))($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                'someValue',
                'enum',
                'enum: someValue'
            ],
            [
                'enum',
                'fake',
                'fake: enum'
            ],
        ];
    }
}
