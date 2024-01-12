<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class RetriveCategoryCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:getcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will return how many category exist';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $category_count = Category::count();
        echo "at this point there is {$category_count} category";
        return Command::SUCCESS;
    }
}
