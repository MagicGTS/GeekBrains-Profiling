<?php

namespace App\Sorts;

abstract class AbstractSort implements SortInterface
{
    protected function swap(array &$elements, int $first, int $second)
    {
        list($elements[$first], $elements[$second]) = [$elements[$second], $elements[$first]];
    }
}
