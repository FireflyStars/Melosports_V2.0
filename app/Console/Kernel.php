<?php

namespace App\Console;
use App\SiteSetting;
use App\Match;
use App\SocialSetting;

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
      //   Commands\Inspire::class,
        Commands\DemoCron::class,
        Commands\WinDeclare::class,       
		Commands\FrndWinDeclare::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
        $schedule->command('demo:cron')
                 ->everyMinute();
		$schedule->command('win:cron')
                 ->everyThirtyMinutes();				 				 
		$schedule->command('frndwin:cron')
                 ->everyThirtyMinutes();
		 			
				 
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
