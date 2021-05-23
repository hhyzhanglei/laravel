<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Order;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function webhook(Request $request){
        Log::notice('查看日志：'.json_encode($request));
    }
    public function add(){
        Redis::set('name','Tar');
    }
}
