<?php

namespace App\Http\Controllers;

use App\Handlers\LoggerHandlerInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LoggerController extends Controller implements LoggerControllerInterface
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(private LoggerHandlerInterface $handler) {}

    public function index(Request $request): void
    {
    }
}
