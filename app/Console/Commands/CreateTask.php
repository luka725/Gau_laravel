<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Storage;

use App\Classes\TasksToBePreformed;

use App\Classes\TasksList;

use Faker\Factory as Faker;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:task {quantity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will creates task object';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $quantity = $this->argument('quantity');
        $faker = Faker::create();
        $list = new TasksList("List 1", "Test Subject");

        for($i = 0; $i <= $quantity; $i++){
            $list->addtask(new TasksToBePreformed($faker->title, $faker->text, $faker->date, $faker->boolean, $faker->date));
        }

        $all = $list->get_all();
        foreach($all as $each){
            Storage::append("All-Tasks.txt", $each->get_formatted_task());
            echo $each->get_formatted_task();
        }
    }
}
