<?php

namespace KunicMarko\GraphQLTest\Tests\Bridge\Symfony;

use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase as BaseTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Prophecy\Argument;

abstract class TestCase extends BaseTestCase
{
    private static $client;

    public function setUp()
    {
        $client = $this->prophesize(Client::class);

        $client->getCookieJar()->willReturn([]);

        $client->request(
            'POST',
            static::$endpoint,
            Argument::type('array'),
            Argument::type('array'),
            Argument::type('array')
        )->shouldBeCalledTimes(1);

        self::$client = $client->reveal();
    }

    protected static function createClient(array $options = [], array $server = [])
    {
        return self::$client;
    }
}
