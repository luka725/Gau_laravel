<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Storage;

class LogDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:log {day}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will store date in log file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $day = $this->argument('day');
        $date = Carbon::now()->addDay($day);
        Storage::append("days.log", $date);
        echo $date;
        return Command::SUCCESS;
    }
}
