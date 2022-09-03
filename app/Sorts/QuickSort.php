<?php

namespace App\Sorts;

class QuickSort extends AbstractSort implements SortInterface
{
    public function sort(array $elements): array
    {
        $left = $right = [];
        $count = count($elements);

        if($count <= 1)
        {
            return $elements;
        }

        $middle = $elements[0];

        for ($i = 1; $i < $count; $i++)
        {
            if($elements[$i] < $middle)
            {
                $left[] = $elements[$i];
            }
            else
            {
                $right[] = $elements[$i];
            }
        }

        $left = $this->sort($left);
        $right = $this->sort($right);

        return array_merge($left, [$middle], $right);
    }


    public function quickSortWithDoWhile(array $elements)
    {
        $min = 0;
        $count =  $max = count($elements);

        $middle = $elements[ $max / 2 ];
        do
        {
            while ($elements[$min] < $middle) ++$min;
            while ($elements[$max] > $middle) --$max;
            if($min <= $max)
            {
                $this->swap($elements, $min, $max);
                $min++; $max--;
            }
        }while($min < $max);

        if(0 < $max)
        {
            $this->quickSortWithDoWhile($elements);
        }

        if($min > $count)
        {
            $this->quickSortWithDoWhile($elements);
        }
    }

}
