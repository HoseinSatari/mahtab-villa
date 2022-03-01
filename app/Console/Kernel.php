<?php

namespace App\Console;

use App\Events\EndVilaEvent;
use App\Events\StartVilaEvent;
use App\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $orders = Order::where('status', 'paid')->orwhere('status', 'prepartion')->get();
            foreach ($orders as $order) {
                if ($order->start == now()->format('Y-m-d')) {
                    $order->update(['status' => 'prepartion']);
                    event(new StartVilaEvent($order->user->phone));
                } elseif ($order->end == now()->format('Y-m-d')) {
                    $order->update(['status' => 'end']);
                    event(new EndVilaEvent($order->user->phone));
                }
            }
        })->everyMinute();
        $schedule->call(function () {
            $orders = Order::where('status', 'unpaid')->get();
            foreach ($orders as $order) {
                $order->update(['status', 'cancel']);
            }

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
