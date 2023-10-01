<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SayHiParam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sayhi:printname {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will say hi with name';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        if($name){
            echo "Hello {$name}!";
        }else{
            echo "Please pass the parameter";
        }
        return Command::SUCCESS;
    }
}
