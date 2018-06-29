<?php

namespace KunicMarko\GraphQLTest\Operation;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
interface QueryInterface
{
    /**
     * Returns formatted Query body
     */
    public function __invoke(): string;
}
