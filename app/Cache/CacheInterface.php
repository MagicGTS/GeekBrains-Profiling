<?php

namespace App\Cache;

interface CacheInterface
{
    public function set(string $key, mixed $value, int $expiration = 0);
}
