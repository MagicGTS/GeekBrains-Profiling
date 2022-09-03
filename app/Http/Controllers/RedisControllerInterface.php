<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

interface RedisControllerInterface
{
    public function index(): JsonResponse;
}
