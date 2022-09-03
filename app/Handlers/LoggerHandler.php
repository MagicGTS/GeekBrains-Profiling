<?php

namespace App\Handlers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerHandler implements LoggerHandlerInterface
{
    public function handle(Request $request):void
    {
        $time_start = time();
        Log::info('Закончил работать в '. $time_start);

        $array = [1, 2, 3, 5, 6 ,8 , 1, 12, 15, 18, 1,2 ,3 ,4, 6, 13, 15 , 17 ]; //пузырьком -1 быстрой сортировки - 2
        $this->buubleSortService->sort($array);

        sort($array);

        //memory_get_usage(); - log debug
        $time_end = time();//меняем на DateTime();
        Log::info('Закончил работать в '. $time_end);
    }
}
