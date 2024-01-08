<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MathRequest;

class MathController extends Controller
{
    public function is_prime(MathRequest $request):array
    {
        $number = $request->get('number');

        if($number <= 1){
            return [ "failed" => "{$number} is Not Prime"];
        }

        for($i = 2; $i * $i <= $number; $i++){
            if($number % $i === 0){
                return [ "failed" => "{$number} is Not Prime"];
            }
        }
        
        return [ "success" => "{$number} is Prime"];
    }
    public function is_palindrome(Request $request):array
    {
        $str = $request->get("string");
        $cleanedStr = strtolower(str_replace(' ', '', $str));
    
        $reversedStr = strrev($cleanedStr);
    
        if ($cleanedStr === $reversedStr){
            return [
                "Sucess" => "{$str} is palindrome"
            ];
        }
        else {
            return [
                "Failed" => "{$str} is not palindrome"
            ];
        }
    }
}
