<?php

namespace KunicMarko\GraphQLTest\Tests\Bridge\Symfony;

use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase as BaseTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Prophecy\Argument;
use Symfony\Component\BrowserKit\CookieJar;

abstract class TestCase extends BaseTestCase
{
    private static $client;
    protected static $cookieJar;

    public function setUp()
    {
        $client = $this->prophesize(Client::class);
        static::$cookieJar = $this->prophesize(CookieJar::class);

        $client->getCookieJar()->willReturn(static::$cookieJar->reveal());

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
