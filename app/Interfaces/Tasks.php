<?php

namespace App\Interfaces;

interface Tasks
{
    public function get_title();
    public function get_description();
    public function check_exec_status();
    public function end_task();
    public function get_formatted_task();
    public function get_json();
}