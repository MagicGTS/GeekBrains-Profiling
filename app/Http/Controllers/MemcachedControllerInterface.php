<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

interface MemcachedControllerInterface
{
    public function index(): JsonResponse;
}
