<?php

namespace KunicMarko\GraphQLTest;

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
