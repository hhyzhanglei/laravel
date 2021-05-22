<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function webhook(Request $request){
        Log::notice('查看日志：'.json_encode($request));
    }
}
