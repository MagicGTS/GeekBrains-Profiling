<?php

namespace App\Sorts;

interface SortInterface
{
    public function sort(array $elements): array;
}
