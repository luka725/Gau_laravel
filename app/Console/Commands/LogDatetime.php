<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Storage;

class LogDatetime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:logdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will creates date-time.log';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datetime = Carbon::now();
        Storage::append("date-time.log", $datetime);
        return Command::SUCCESS;
    }
}
