<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SimpleAdditionRequest;
class SimpleAdditionController extends Controller
{
    public function addition(SimpleAdditionRequest $request)
    {
        $data = $request->validated();
        $addition = $data['number1'] + $data['number2'];
        return [
            'your addition' => "{$data['number1']} + {$data['number2']} = {$addition}"
        ];
    }
}
