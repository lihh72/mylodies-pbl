<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Illuminate\Support\Carbon;

class AutoShipOrders extends Command
{
    protected $signature = 'orders:auto-ship';
    protected $description = 'Tandai order sebagai "shipped" jika start_date = hari ini dan status = processing';

    public function handle()
    {
        $today = Carbon::today()->toDateString();

        $affected = Order::where('status', 'processing')
            ->whereDate('start_date', $today)
            ->update(['status' => 'shipped']);

        $this->info("✅ Berhasil mengupdate $affected order.");
    }
}


