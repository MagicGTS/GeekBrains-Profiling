<?php

namespace App\Services;

use App\Cache\CacheInterface;
use App\Cache\Enums\Cache;
use App\Cache\Enums\CachePort;

class RedisService extends AbstractCacheService implements RedisServiceInterface
{
    protected function getConnection(): CacheInterface
    {
        $redis = $this->getAppRedis();
        $redis->connect(Cache::REDIS->value, CachePort::REDIS_PORT->value);

        return $redis;
    }
}
