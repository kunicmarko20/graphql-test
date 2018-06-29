<?php

namespace KunicMarko\GraphQLTest\Formatter;

use KunicMarko\GraphQLTest\Type;
use function is_array;
use function is_string;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
abstract class Formatter implements FormatterInterface
{
    public function __invoke(array $items): string
    {
        if (!$items) {
            return '';
        }

        $formattedItems = [];

        foreach ($items as $key => $value) {
            $formattedItems[] = $this->formatChild($key, $value);
        }

        return sprintf($this->getMainFormat(), implode($this->getImplodeGlue(), $formattedItems));
    }

    private function formatChild($identifier, $value): string
    {
        if (is_array($value)) {
            $items = [];

            foreach ($value as $key => $childValue) {
                $items[] = $this->formatChild($key, $childValue);
            }

            return sprintf($this->getChildArrayFormat(), $identifier, implode($this->getImplodeGlue(), $items));
        }

        if ($value instanceof Type) {
            return sprintf($this->getChildTypeFormat(), $identifier, (string) $value);
        }

        if (is_string($value)) {
            return sprintf($this->getChildStringFormat(), $identifier, $value);
        }

        return sprintf($this->getChildDefaultFormat(), $identifier, $value);
    }

    abstract public function getMainFormat(): string;
    abstract public function getImplodeGlue(): string;
    abstract public function getChildArrayFormat(): string;
    abstract public function getChildTypeFormat(): string;
    abstract public function getChildStringFormat(): string;
    abstract public function getChildDefaultFormat(): string;
}
