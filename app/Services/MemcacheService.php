<?php

namespace App\Services;

use App\Cache\CacheInterface;
use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;

class MemcacheService extends AbstractCacheService implements MemcacheServiceInterface
{
    protected function getConnection(): CacheInterface
    {
        $memcached = $this->getAppMemcached();
        $memcached->addServer(Cache::MEMCACHE->value, CachePort::MEMCACHE_PORT->value);

        return $memcached;
    }
}
