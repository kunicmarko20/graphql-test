<?php

namespace KunicMarko\GraphQLTest;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
interface MutationInterface
{
    /**
     * Returns formatted Mutation body
     */
    public function __invoke(): string;
}
