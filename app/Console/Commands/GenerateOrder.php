<?php

namespace App\Console\Commands;

use App\Models\Goods;
use App\Models\Order;
use App\Models\Users;
use Illuminate\Console\Command;

class GenerateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $all_user = Users::query()->pluck('id')->toArray();
        $user_id = array_rand($all_user,1);
        $all_goods = Goods::query()->pluck('id')->toArray();
        $goods_id = array_rand($all_goods,1);
        $order_number = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $create = [
            'user_id' => $user_id,
            'goods_id' => $goods_id,
            'number' => $order_number,
            'status' => 1
        ];
        Order::query()->create($create);
    }
}
