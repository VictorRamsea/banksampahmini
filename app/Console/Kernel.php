<?php

namespace App\Console;

use App\Models\TransaksiModel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $ket = TransaksiModel::where('keterangan_transaksi', 'pending')->get();
            foreach ($ket as $k) {
                $k->keterangan_transaksi = 'gagal';
                $k->save();
            }

            $warna = TransaksiModel::where('warna_transaksi', 'warning')->get();
            foreach ($warna as $w) {
                $w->warna_transaksi = 'danger';
                $w->save();
            }
        })->dailyAt('11:59');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
