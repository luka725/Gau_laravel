<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Car;

class CarController extends Controller
{
    public function make_car()
    {
        $car = new Car();
        return [
            'success' => $car
        ];
    }
}
