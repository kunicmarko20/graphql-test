<?php

namespace KunicMarko\GraphQLTest\Tests\Type;

use KunicMarko\GraphQLTest\Type\BooleanType;
use PHPUnit\Framework\TestCase;

class BooleanTypeTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(BooleanType $booleanType, string $value, string $identifier, string $expected)
    {
        $this->assertAttributeEquals($value, 'value', $booleanType);
        $this->assertSame($expected, $booleanType($identifier));
    }

    public function invokeData(): array
    {
        return [
            [
                new BooleanType(true),
                'true',
                'bool',
                'bool: true'
            ],
            [
                new BooleanType(false),
                'false',
                'fake',
                'fake: false'
            ],
        ];
    }
}
