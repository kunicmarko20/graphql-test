<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\BooleanType;
use PHPUnit\Framework\TestCase;

class BooleanTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(BooleanType $booleanType, string $identifier, string $expected)
    {
        $this->assertSame($expected, $booleanType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new BooleanType(true),
                'bool',
                'bool: true'
            ],
            [
                new BooleanType(false),
                'fake',
                'fake: false'
            ],
        ];
    }
}
