<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\TasksToBePreformed;

use Faker\Factory as Faker;

use App\Http\Requests\TaskRequest;

class TaskInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TaskRequest $request)
    {
        $data = $request->validated();
        $task = new TasksToBePreformed($data['title'], $data['description'], $data['exec_date'], $data['exec_status'], $data['completion_date']);
        $task->exec_status = 1;
        return [
            'Task Title: ' => $data['title'],
            'Task Completion Date: ' => $data['completion_date']
        ];
    }
}
