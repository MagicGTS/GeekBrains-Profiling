<?php

namespace App\Services;

use App\Cache\AppMemcachedInterface;
use App\Cache\AppRedisInterface;
use App\Cache\CacheInterface;
use Generator;
use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

abstract class AbstractCacheService implements ServiceSubscriberInterface
{
    final public function __construct(private readonly ContainerInterface $container)
    {
    }

    public function setValues(array $values): void
    {
        foreach ($values as $key => $value)
        {
            $this->getConnection()->set($key, $value);
        }
    }

    public function getValues(array $keys): Generator
    {
        foreach ($keys as $key)
        {
            yield $key => $this->getConnection()->get($key);
        }
    }

    public function getAppRedis(): AppRedisInterface
    {
        return $this->container->get(AppRedisInterface::class);
    }

    public function getAppMemcached(): AppMemcachedInterface
    {
        return $this->container->get(AppMemcachedInterface::class);
    }

    abstract protected function getConnection(): CacheInterface;

    public static function getSubscribedServices(): array
    {
        return
        [
            AppRedisInterface::class.
            AppMemcachedInterface::class
        ];
    }
}
