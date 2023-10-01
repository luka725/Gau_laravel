<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SayHi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sayhi:print';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will print Hi';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Hello World!";
        return Command::SUCCESS;
    }
}
