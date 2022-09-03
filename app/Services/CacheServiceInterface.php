<?php

namespace App\Services;

use Generator;

interface CacheServiceInterface
{
    public function setValues(array $values): void;
    public function getValues(array $keys): Generator;
}
