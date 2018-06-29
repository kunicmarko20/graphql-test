<?php

namespace KunicMarko\GraphQLTest\Operation;

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
