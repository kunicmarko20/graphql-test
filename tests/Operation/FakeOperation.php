<?php

namespace KunicMarko\GraphQLTest\Tests\Operation;

use KunicMarko\GraphQLTest\Operation\Operation as RealOperation;

class FakeOperation extends RealOperation
{
    public function getOperationName(): string
    {
        return 'fake?';
    }

    protected function initializeFormatters(): void
    {
    }
}
