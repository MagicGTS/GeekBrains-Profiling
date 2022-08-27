<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface LoggerControllerInterface
{
    public function index(Request $request):void;
}
