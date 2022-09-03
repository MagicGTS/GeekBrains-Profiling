<?php

namespace App\Cache\Enums;

enum Cache: string
{
    case MEMCACHE = 'memcached';
    case REDIS = 'redis';
}
