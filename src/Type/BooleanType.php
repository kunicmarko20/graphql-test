<?php

namespace KunicMarko\GraphQLTest\Type;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class BooleanType implements TypeInterface
{
    /**
     * @var string
     */
    private $value;

    public function __construct(bool $value)
    {
        $this->value = $value ? 'true' : 'false';
    }

    public function __invoke($identifier): string
    {
        return $identifier . ':' .$this->value;
    }
}
