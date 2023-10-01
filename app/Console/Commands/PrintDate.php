<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class PrintDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'date:print';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will prints date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now();
        $aftermonth = Carbon::now()->addMonth();
        $endofyear = Carbon::now()->endOfYear();
        $daysleft = $today->diffInDays($endofyear);
        echo "Today: {$today}\nAfter Month: {$aftermonth}\n{$daysleft} Days left";
        return Command::SUCCESS;
    }
}
