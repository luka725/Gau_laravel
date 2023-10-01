<?php

namespace App\Traits;

use Storage;

trait Logger{
    public function makeLog($name):void{
        Storage::append('Persons.log', "New Person Created! ({$name})");
    }
}