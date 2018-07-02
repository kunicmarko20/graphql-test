<?php

namespace KunicMarko\GraphQLTest\Tests\Formatter;

use KunicMarko\GraphQLTest\Formatter\FieldsFormatter;
use PHPUnit\Framework\TestCase;

class FieldsFormatterTest extends TestCase
{
    /**
     * @dataProvider invokeData
     */
    public function testInvoke(string $expected, array $items)
    {
        $this->assertSame($expected, (new FieldsFormatter())($items));
    }

    public function invokeData(): array
    {
        return [
            [
                <<<GQL
{
id
}
GQL
                , ['id'],
            ],
            [
                <<<GQL
{
id
name
}
GQL
                , ['id', 'name'],
            ],
            [
                <<<GQL
{
id
roles {
name
test {
one
}
}
field
}
GQL
                , ['id', 'roles' => ['name', 'test' => ['one']], 'field'],
            ],
        ];
    }
}
