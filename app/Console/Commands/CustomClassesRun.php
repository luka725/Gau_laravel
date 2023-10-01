<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\Person;
use App\Classes\Student;
use App\Classes\Circle;
use App\Classes\Rectangle;

class CustomClassesRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'classes:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will print output for classes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        #1-7
        // $person = new Person("Sasha", 23);
        // $person->printString();
        // echo($person->getAge());
        // $persons = array();
        // $persons[0] = new Person("Luka", 23);
        // $persons[1] = new Person("Lukka", 25); 
        // $avg = Person::agesAverage($persons);
        // echo("Average: " . $avg . "\n");


        //$student = new Student("Luka", 23, 1);
        //echo $student->getStudentId();
        //echo $student->getAge();

        #8-15
        // $circles_rectangles = array();
        // $circles_rectangles[0] = new Circle();
        // $circles_rectangles[1] = new Rectangle();

        // foreach($circles_rectangles as $element){
        //     $element->calculateArea();
        // }

        // $circle = new Circle();
        // $circle->calculateArea(1);

        return Command::SUCCESS;
    }
}
