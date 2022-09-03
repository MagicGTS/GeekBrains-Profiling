<?php

namespace App\Http\Controllers;
use App\Models\Cource;
use Illuminate\Support\Facades\Log;

use App\Services\RedisServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class RedisController extends Controller implements RedisControllerInterface
{
    public function __construct(private RedisServiceInterface $redisService)
    {
    }

    public function index(): JsonResponse
    {
        $time_start = microtime(true);
        $keys = ['cources'];
        $cache = $this->redisService->getValues($keys);
        foreach (iterator_to_array($cache) as $key){
            if($key === false){
                $values = [
                    'cources' => Cource::all()->toJson(),
                ];
                $time_db = microtime(true);
                Log::Debug("Redis: Запрос из БД: ".($time_db - $time_start));
                $this->redisService->setValues($values, 'EX', 35);
                Log::Debug("Redis: Запись в Кэш: ".(microtime(true) - $time_db));
                Log::Debug("Redis: Всего по времени: ".(microtime(true) - $time_start));
                return new JsonResponse($values['cources']);
            }else{
                Log::Debug("Redis: Запрос из кэша: ".(microtime(true) - $time_start));
                return new JsonResponse($key);
            }
        }

    }
}
