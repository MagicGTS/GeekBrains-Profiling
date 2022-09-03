<?php

namespace App\Http\Controllers;
use App\Models\Cource;
use App\Services\MemcacheServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Log;

class MemcachedController extends Controller implements MemcachedControllerInterface
{
    public function __construct(private MemcacheServiceInterface $memcacheService)
    {
    }

    public function index(): JsonResponse
    {
        $time_start = microtime(true);
        $keys = ['cources'];
        $cache = $this->memcacheService->getValues($keys);
        foreach (iterator_to_array($cache) as $key){
            if($key === false){
                $values = [
                    'cources' => Cource::all()->toArray(),
                ];
                $time_db = microtime(true);
                Log::Debug("Memcache: Запрос из БД: ".($time_db - $time_start));
                $this->memcacheService->setValues($values,20);
                Log::Debug("Memcache: Запись в Кэш: ".(microtime(true) - $time_db));
                Log::Debug("Memcache: Всего по времени: ".(microtime(true) - $time_start));
                return new JsonResponse($values['cources']);
            }else{
                Log::Debug("Memcache: Запрос из кэша: ".(microtime(true) - $time_start));
                return new JsonResponse($key);
            }
        }
    }
}
