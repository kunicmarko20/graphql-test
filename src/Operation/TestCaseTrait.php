<?php

namespace KunicMarko\GraphQLTest\Operation;

/**
 * @internal
 *
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
trait TestCaseTrait
{
    protected static $endpoint = '/graphql';

    /**
     * @var array
     */
    private $headers = [];

    public function query(QueryInterface $query, array $files = [], array $headers = [])
    {
        return $this->call(
            'POST',
            static::$endpoint,
            ['query' => $query()],
            [],
            $files,
            array_merge($this->headers, $headers)
        );
    }

    public function mutation(MutationInterface $mutation, array $files = [], array $headers = [])
    {
        return $this->call(
            'POST',
            static::$endpoint,
            ['query' => $mutation()],
            [],
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
