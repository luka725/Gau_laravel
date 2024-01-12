<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class RetriveProductCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:getcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will return how many product exists';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_count = Product::count();
        echo "at this point {$product_count} product exist";
        return Command::SUCCESS;
    }
}
