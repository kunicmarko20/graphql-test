<?php

namespace KunicMarko\GraphQLTest;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class Query extends Operation implements QueryInterface
{
    public function getOperationName(): string
    {
        return 'query';
    }
}
