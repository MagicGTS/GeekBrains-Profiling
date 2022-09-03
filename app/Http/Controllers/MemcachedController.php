<?php

namespace App\Http\Controllers;


use App\Services\MemcacheServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class MemcachedController extends Controller implements MemcachedControllerInterface
{
    public function __construct(private MemcacheServiceInterface $memcacheService)
    {
    }

    public function index(): JsonResponse
    {
        $keys = ['int', 'string',  'array'];

        $values = [
            'int' => 99,
            'string' => 'a simple string',
            'array' => [11, 22]
        ];

        $this->memcacheService->setValues($values);

        return new JsonResponse(iterator_to_array($this->memcacheService->getValues($keys)));
    }
}
