<?php

namespace App\Cache;

interface AppMemcachedInterface extends CacheInterface
{
    public function addServer(string $host, int $port, int $weight = 0);
    public function get(string $key, ?callable $cache_cb = null, int $get_flags = 0);
}
