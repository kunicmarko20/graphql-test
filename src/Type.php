<?php

namespace KunicMarko\GraphQLTest;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class Type
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
