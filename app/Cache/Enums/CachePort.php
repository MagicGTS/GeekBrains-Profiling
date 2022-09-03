<?php

namespace App\Cache\Enums;

enum CachePort: int
{
    case MEMCACHE_PORT = 11211;
    case REDIS_PORT = 6379;
}
