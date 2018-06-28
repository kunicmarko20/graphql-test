<?php

namespace KunicMarko\GraphQLTest\Formatter;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
interface FormatterInterface
{
    /**
     * Returns formatted body
     */
    public function __invoke(array $items): string;
}
