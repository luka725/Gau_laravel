<?php

namespace App\Classes;

use App\Traits\Logger;

class Person{
    use Logger;
    
    public string $name;
    protected int $age;

    public function __construct(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
        $this->makeLog($this->name);
    }

    public function printString():void{
        echo "Formatted: {$this->name} {$this->age}\n";
    }

    public function getAge():string{
        return "$this->age";
    }

    public static function agesAverage($objects_array):int{
        $count = 0;
        foreach($objects_array as $object){
            $count += intval($object->getAge());
        }
        $avg = $count/count($objects_array);
        return $avg;
    }
}