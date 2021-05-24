<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ChangeOrderJob;
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
        $all_user = Users::query()->pluck('id')->toArray();
        $user_id = array_rand($all_user,1);
        Log::notice('用户id'.$user_id);
        $all_goods = Goods::query()->pluck('id')->toArray();
        Log::notice('商品id'.json_encode($all_goods));
        $goods_id = array_rand($all_goods,1);
        Log::notice('商品id'.$goods_id);
        $order_number = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        Log::notice('生成订单编号'.$order_number);
        $create = [
            'user_id' => $user_id,
            'goods_id' => $goods_id,
            'number' => $order_number,
            'status' => 1,
        ];
        Order::query()->create($create);
    }
    public function addJob(){
        $order_id = Order::query()->pluck('id')->toArray();
        $id = array_rand($order_id,1);
        $order = Order::query()->find($id);
        if(!$order){
            return 'error';
        }
        Log::notice('推送进队列'.$order);
        ChangeOrderJob::dispatch($order);
    }
}
