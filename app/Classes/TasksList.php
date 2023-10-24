<?php

namespace App\Classes;


class TasksList
{
    public string $list_title;
    public string $list_description;
    public array $list;

    public function __construct( string $list_title, string $list_description){
        $this->list_title = $list_title;
        $this->list_description = $list_description;
        $this->list = [];

    }
    public function addtask(object $task){
        array_push($this->list, $task);
    }
    public function get_all(){
        return $this->list;
    }
}