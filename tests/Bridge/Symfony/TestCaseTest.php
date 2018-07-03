<?php

namespace KunicMarko\GraphQLTest\Tests\Bridge\Symfony;

use KunicMarko\GraphQLTest\Operation\Mutation;
use KunicMarko\GraphQLTest\Operation\Query;

class TestCaseTest extends TestCase
{
    public function testQuery()
    {
        $this->setDefaultHeaders(['Content-Type' => 'application/json']);

        $this->query(new Query('someFakeQuery'));
    }

    public function testMutation()
    {
        $this->mutation(new Mutation('someFakeMutation'), [], ['Content-Type' => 'application/json']);
    }
}
