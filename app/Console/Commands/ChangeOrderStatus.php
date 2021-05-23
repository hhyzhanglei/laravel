<?php

namespace App\Console\Commands;

use App\Jobs\ChangeOrderJob;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ChangeOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $data = Order::query()->where('status',1)->get();
        Log::notice('推送进队列的任务'.json_encode($data));
        ChangeOrderJob::dispatch($data);
    }
}
