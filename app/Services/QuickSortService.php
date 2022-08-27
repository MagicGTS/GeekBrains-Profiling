<?php

namespace App\Services;

class QuickSortService
{
    private function partition(&$arr, $leftIndex, $rightIndex)
    {
        $pivot = $arr[($leftIndex + $rightIndex) / 2];

        while ($leftIndex <= $rightIndex) {
            while ($arr[$leftIndex] < $pivot) {
                $leftIndex++;
            }

            while ($arr[$rightIndex] > $pivot) {
                $rightIndex--;
            }

            if ($leftIndex <= $rightIndex) {
                $tmp = $arr[$leftIndex];
                $arr[$leftIndex] = $arr[$rightIndex];
                $arr[$rightIndex] = $tmp;
                $leftIndex++;
                $rightIndex--;
            }
        }
        return $leftIndex;
    }

    public function sort(&$arr, $leftIndex = -1, $rightIndex = -1)
    {
        if ($leftIndex == -1 || $rightIndex == -1){
            $left = 0;
            $right = count($arr) - 1;
        } else{
            $left = $leftIndex;
            $right = $rightIndex;
        }
        $index = $this->partition($arr, $left, $right);
        if ($left < $index - 1) {
            $this->sort($arr, $left, $index - 1);
        }

        if ($index < $right) {
            $this->sort($arr, $index, $right);
        }

    }
}
