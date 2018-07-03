<?php

namespace KunicMarko\GraphQLTest\Bridge\Symfony;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use KunicMarko\GraphQLTest\Bridge\TestCaseTrait;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
class TestCase extends WebTestCase
{
    use TestCaseTrait;

    private function call(
        string $method,
        string $uri,
        array $parameters = [],
        array $cookies = [],
        array $files = [],
        array $headers = []
    ) {
        $client = static::createClient();
        $cookieJar = $client->getCookieJar();

        foreach ($cookies as $cookie) {
            $cookieJar->set($cookie);
        }

        $client->request(
            $method,
            $uri,
            $parameters,
            $files,
            $headers
        );

        return $client;
    }
}
