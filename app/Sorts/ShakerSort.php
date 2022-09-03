<?php

namespace App\Sorts;

class ShakerSort extends AbstractSort implements SortInterface
{
    public function sort(array $elements): array
    {
        $count = count($elements);
        $left = 0;
        $right = $count - 1;

        do{
            for ($i = $left; $i < $right; $i++)
            {
                if($elements[$i] > $elements[$i + 1])
                {
                   $this->swap($elements,$i , $i+1);
                }
            }

            $right--;
            for ($i = $right; $i > $left; $i --)
            {
                if($elements[$i] < $elements[$i - 1])
                {
                    $this->swap($elements, $i, $i -1);
                }
            }
            $left++;

        }while($left <= $right);

        return $elements;
    }
}
