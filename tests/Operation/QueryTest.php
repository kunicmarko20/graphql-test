<?php

namespace KunicMarko\GraphQLTest\Tests\Operation;

use KunicMarko\GraphQLTest\Operation\Query;

class QueryTest extends Operation
{
    protected function getOperationName(): string
    {
        return 'query';
    }

    protected function getClass()
    {
        return new Query(...func_get_args());
    }
}
