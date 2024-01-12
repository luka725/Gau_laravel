<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use League\Csv\Writer;
use Storage;

class CategoryGetCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:getcsv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will generates category.csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categories = Category::all();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['ID', 'Name']);

        foreach ($categories as $category) {
            $csv->insertOne([$category->id, $category->name]);
        }

        $path = 'app/categories.csv';

        Storage::disk('local')->append($path, $csv->getContent());
        return Command::SUCCESS;
    }
}
