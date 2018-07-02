<?php

namespace KunicMarko\GraphQLTest\Tests\Operation;

use KunicMarko\GraphQLTest\Operation\Mutation;

class MutationTest extends Operation
{
    protected function getOperationName(): string
    {
        return 'mutation';
    }

    protected function getClass()
    {
        return new Mutation(...func_get_args());
    }
}
