<?php

namespace KunicMarko\GraphQLTest\Formatter;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
final class ParametersFormatter extends Formatter
{
    public function getMainFormat(): string
    {
        return '(%s)';
    }

    public function getImplodeGlue(): string
    {
        return ',';
    }

    public function getChildArrayFormat(): string
    {
        return "%s: {%s} \n";
    }

    public function getChildStringFormat(): string
    {
        return '%s: "%s"';
    }

    public function getChildDefaultFormat(): string
    {
        return '%s: %s';
    }
}
