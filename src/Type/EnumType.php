<?php

namespace KunicMarko\GraphQLTest\Type;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class EnumType implements TypeInterface
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __invoke($identifier): string
    {
        return $identifier . ': ' .$this->value;
    }
}
