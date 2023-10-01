<?php

namespace App\Classes;

use App\Traits\Movable;
use App\Traits\Scalable;

interface Resizable{
    public function resize():void;
}

abstract class Shape{
    
    public abstract function calculateArea($radius):int;

}