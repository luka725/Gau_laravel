<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\Http\Requests\TaskListRequest;

use App\Classes\TasksToBePreformed;

use App\Classes\TasksList;

use Faker\Factory as Faker;

class TaskController extends Controller
{
    public function operate(TaskRequest $request){
        $data = $request->validated();
        $task = new TasksToBePreformed($data['title'], $data['description'], $data['exec_date'], $data['exec_status'], $data['completion_date']);
        return $task->get_json();
    }
    public function operate_with_param(TaskListRequest $request){
        $data = $request->validated();
        $faker = Faker::create();
        $list = new TasksList($data['title'], $data['description']);

        for($i = 0; $i <= $data['count']; $i++){
            $list->addtask(new TasksToBePreformed($faker->title, $faker->text, $faker->date, $faker->boolean, $faker->date));
        }
        $all = $list->get_all();

        return json_encode($all);
    }
}
