<?php

namespace App\Handlers;

use Illuminate\Http\Request;

interface LoggerHandlerInterface
{
    public function handle(Request $request):void;
}
