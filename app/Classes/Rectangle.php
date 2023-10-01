<?php

namespace App\Classes;

class Rectangle extends Shape implements Resizable{

    public function calculateArea():int{
        echo "Rectangle Area...\n";
        return 1;
    }
    public function resize():void{
        echo "Rectangle Resized...\n";
    }
}