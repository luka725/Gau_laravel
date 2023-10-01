<?php

namespace App\Traits;

trait Movable{
    public function move($arg):void{
        echo "{$arg} Moved...\n";
    }
}
