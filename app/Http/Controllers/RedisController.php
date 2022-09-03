<?php

namespace App\Http\Controllers;

use App\Services\RedisServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class RedisController extends Controller implements RedisControllerInterface
{
    public function __construct(private RedisServiceInterface $redisService)
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

        $this->redisService->setValues($values);
        return new JsonResponse(iterator_to_array($this->redisService->getValues($keys)));
    }
}
