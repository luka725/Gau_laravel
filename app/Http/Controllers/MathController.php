<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{

    public function isPrime(Request $request):array
    {

        $number = $request->get('number');

        return [
            'isPrime' => "Yes"#$this->is_prime($number)
        ];
    }

    private function is_prime(int $number):string|bool
    {

        if($number <= 1){
            return "{$number} is Not Prime";
        }

        for($i = 2; $i * $i <= $number; $i++){
            if($number % $i === 0){
                return false;
            }
        }
        
        return "{$number} is Prime";
    }
}
