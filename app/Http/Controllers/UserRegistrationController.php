<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\UserRegistrationRequest;

class UserRegistrationController extends Controller
{
    public function register(UserRegistrationRequest $request){
        $data = $request->validated();
        Storage::append('User.txt', "name: {$data['name']}\nemail: {$data['email']}\npassword: {$data['password']}\n");
        return[
            'Succes' => 'Registration Completed.'
        ];
    }
}
