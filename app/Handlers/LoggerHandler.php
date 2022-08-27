<?php

namespace App\Handlers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\QuickSortService;
use \DateTime;


class LoggerHandler implements LoggerHandlerInterface
{
    public function __construct(private QuickSortService $quickSortService)
    {
    }

    public function handle(Request $request):void
    {
        $time_start = new DateTime();
        $mem_start = memory_get_usage();
        Log::info('Начал работать в '. $time_start->format('Y-m-d H:i:s'));
        Log::Debug('Память в начале '. $mem_start);
        $array = [1, 2, 3, 5, 6, 8, 1, 12, 15, 18, 1, 2, 3, 4, 6, 13, 15, 17 ]; //пузырьком -1 быстрой сортировки - 2
        $this->quickSortService->sort($array);
        echo var_dump($array);
        $time_end = new DateTime();//меняем на DateTime();
        $mem_end = memory_get_usage();
        Log::info('Закончил работать в '. $time_end->format('Y-m-d H:i:s'));
        Log::Debug('Память в конце '. memory_get_usage() .' дельта '. $mem_end - $mem_start);
    }
}
