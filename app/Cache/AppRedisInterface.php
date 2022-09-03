<?php

namespace App\Cache;

interface AppRedisInterface extends CacheInterface
{

    public function get($key);
}
