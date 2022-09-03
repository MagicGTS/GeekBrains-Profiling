<?php

namespace App\Sorts;

class BubbleAbstractSort extends AbstractSort implements BubbleSortInterfaceInterface
{
    public function sort(array $elements): array
    {
        $count = count($elements);
        for($i = 0; $i< $count; $i++)
        {
            for ($j = $i + 1; $j < $count; $j++)
            {
                if($elements[$i] > $elements[$j])
                {
                    $this->swap($elements, $i, $j);
                }
            }
        }

        return $elements;
    }
}
