<?php

namespace KunicMarko\GraphQLTest\Bridge;

use KunicMarko\GraphQLTest\Operation\MutationInterface;
use KunicMarko\GraphQLTest\Operation\QueryInterface;

/**
 * @internal
 *
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
trait TestCaseTrait
{
    protected static $endpoint = '/graphql';
    
    protected static $method = 'POST';

    /**
     * @var array
     */
    private $headers = [];

    public function query(QueryInterface $query, array $files = [], array $headers = [], array $cookies = [])
    {
        return $this->call(
            static::$method,
            static::$endpoint,
            ['query' => $query()],
            $cookies,
            $files,
            array_merge($this->headers, $headers)
        );
    }

    public function mutation(MutationInterface $mutation, array $files = [], array $headers = [], array $cookies = [])
    {
        return $this->call(
            static::$method,
            static::$endpoint,
            ['query' => $mutation()],
            $cookies,
            $files,
            array_merge($this->headers, $headers)
        );
    }

    public function setDefaultHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function addDefaultHeader(string $key, $value): void
    {
        $this->headers[$key] = $value;
    }
}
