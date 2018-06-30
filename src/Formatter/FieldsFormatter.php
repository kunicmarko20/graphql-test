<?php

namespace KunicMarko\GraphQLTest\Formatter;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class FieldsFormatter extends Formatter
{
    public function getMainFormat(): string
    {
        return '{%s}';
    }

    public function getImplodeGlue(): string
    {
        return "\n";
    }

    public function getChildArrayFormat(): string
    {
        return "%s {%s}\n";
    }

    public function getChildStringFormat(): string
    {
        return $this->getChildDefaultFormat();
    }

    public function getChildDefaultFormat(): string
    {
        return '%2$s ' . "\n";
    }
}
