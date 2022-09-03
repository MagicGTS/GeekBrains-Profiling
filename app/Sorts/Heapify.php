<?php

namespace App\Sorts;

class Heapify
{
    public function main(array &$elements)
    {
        $count = count($elements);
        for ($i = ($count / 2) - 1; $i >= 0; $i--)
        {
            $this->sort($elements, $count, $i);
        }
    }




    public function sort(array &$elements, int $count, $root): void
    {
        $max = $root;
        $left = 2 * $root + 1;
        $right = 2 * $root + 2;

        if($left < $count && $elements[$left] > $elements[$max])
        {
            $max = $left;
        }

        if($right < $count && $elements[$right] > $elements[$max])
        {
            $max = $right;
        }


        if($max != $root)
        {
            list($elements[$root], $elements[$max]) = [$elements[$max], $elements[$root]];
        }

        $this->sort($elements, $count, $max);
    }
}
