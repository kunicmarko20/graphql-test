<?php

namespace KunicMarko\GraphQLTest\Tests\Bridge\Symfony;

use KunicMarko\GraphQLTest\Operation\Mutation;
use KunicMarko\GraphQLTest\Operation\Query;
use Symfony\Component\BrowserKit\Cookie;

class TestCaseTest extends TestCase
{
    public function testQuery()
    {
        $this->setDefaultHeaders(['Content-Type' => 'application/json']);

        $this->query(new Query('someFakeQuery'));
    }

    public function testMutation()
    {
        static::$cookieJar->set($cookie = new Cookie('fake', 'cookie'));

        $this->mutation(
            new Mutation('someFakeMutation'),
            [],
            ['Content-Type' => 'application/json'],
            [$cookie]
        );
    }
}
