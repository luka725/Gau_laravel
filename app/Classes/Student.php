<?php

namespace App\Classes;


class Student extends Person{

    protected int $studentId;

    public function __construct(string $name, int $age, int $studentId){
        parent::__construct($name, $age);
        $this->studentId = $studentId;
    }

    public function getAge():string{
        return "Age: {$this->age}\nId: {$this->studentId}";
    }

    public function getStudentId():string{
        return "Student Id: {$this->studentId}\n";
    }

}