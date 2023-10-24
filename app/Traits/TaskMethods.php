<?php

namespace App\Traits;

trait TaskMethods
{
    public function get_title(){
        return $this->title;
    }
    public function get_description(){
        return $this->description;
    }
    public function check_exec_status(){
        return $this->exec_status;
    }
    public function get_completion_date(){
        return $this->completion_date;
    }
    public function get_formatted_task(){
        return "Name: {$this->title}\nDescription: {$this->description}\nExecution Status: {$this->exec_status}\nExecution Date:{$this->exec_date}\nCompletion Date:{$this->completion_date}\n\n";
    }
    public function end_task(){
        $this->exec_status = true;
    }
    public function get_json(){
        $this->json_array = array(
            'name' => $this->title,
            'desc' => $this->description,
            'exec_date' => $this->exec_date,
            'exec_status' => $this->exec_status,
            'completion_date' => $this->completion_date,
        );

        return json_encode($this->json_array);
    }
}