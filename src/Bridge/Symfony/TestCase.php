<?php

namespace KunicMarko\GraphQLTest\Bridge\Symfony;

use KunicMarko\GraphQLTest\TestCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
class TestCase extends WebTestCase
{
    use TestCaseTrait;

    private function call(string $method, string $uri, array $parameters = [], array $files = [], array $headers = [])
    {
        $client = static::createClient();

        $client->request(
            $method,
            $uri,
            $parameters,
            $files,
            array_merge($headers, $this->headers)
        );

        return $client;
    }
}
