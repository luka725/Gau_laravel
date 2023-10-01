<?php

namespace App\Classes;

use App\Traits\Movable;
use App\Traits\Scalable;

class Circle extends Shape implements Resizable{
    use Movable;
    use Scalable;

    public string $DEFINITION = "Circle";

    public function __construct(){
        $this->move($this->DEFINITION);
        $this->scale($this->DEFINITION);
    }

    public function calculateArea($radius):int{
        if($radius < 0){
            throw new InvalidArgumentException("Radius cannot be negative.");
        }
        elseif(!intval($radius)){
            throw new InvalidArgumentException("Radius should be a number.");
        }
        else{
            echo "Circle Area...\n";
        }
        return 1;
    }
    public function resize():void{
        echo "Circle Resized...\n";
    }
}