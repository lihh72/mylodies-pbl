<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
| Here you may define all of your Closure based console commands. Each
| Closure is bound to a command instance allowing a simple approach
| to interacting with each command's IO methods.
*/

// 🧠 Contoh Command: Inspire
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// ✅ Command manual (opsional, bisa untuk testing manual)
Artisan::command('schedule:daily-auto-ship', function () {
    $this->call('orders:auto-ship');
})->purpose('Update order processing → shipped jika start_date = hari ini');


// ✅ Scheduler Laravel (aktif saat 'php artisan schedule:run' dijalankan via cron)
app(Schedule::class)->command('orders:auto-ship')
    ->dailyAt('00:10')
    ->description('Update otomatis order yang start_date = hari ini menjadi shipped');
