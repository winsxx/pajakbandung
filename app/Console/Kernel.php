<?php namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
        'App\Console\Commands\SkpdPbbGen',
        'App\Console\Commands\SkpdkbPbbGen'
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();
        $schedule->command('skpdPbbGen')
            ->monthly()
            ->when(function(){
                if (Carbon::now()->month == 4) return true;
            })
            ->withoutOverlapping();
        $schedule->command('skpdkbPbbGen')
            ->monthly()
            ->when(function(){
                if (Carbon::now()->month == 5) return true;
            })
            ->withoutOverlapping();
	}

}
