<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use League\Csv\Writer;
use Storage;

class GenerateProductCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:getcsv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This product will store products.csv file in storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Product::all();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['ID', 'Name', 'Price', 'Description', 'Category ID']);

        foreach ($products as $product) {
            $csv->insertOne([$product->id, $product->name, $product->price, $product->description, $product->category_id]);
        }

        $path = 'app/products.csv';

        Storage::disk('local')->append($path, $csv->getContent());
        return Command::SUCCESS;
    }
}
