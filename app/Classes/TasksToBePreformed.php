<?php   

namespace App\Classes;

use App\Interfaces\Tasks;
use App\Traits\TaskMethods;

class TasksToBePreformed implements Tasks
{
    use TaskMethods;
    public string $title;
    public string $description;
    public string $exec_date;
    public bool $exec_status;
    public string $completion_date;
    public array $json_array;

    public function __construct(string $title, string $description, string $exec_date, bool $exec_status = false, string $completion_date){
        $this->title = $title;
        $this->description = $description;
        $this->exec_date = $exec_date;
        $this->exec_status = $exec_status;
        $this->completion_date = $completion_date;
    }
}