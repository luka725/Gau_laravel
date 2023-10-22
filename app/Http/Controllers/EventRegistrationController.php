<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRegistrationRequest;

use Illuminate\Support\Facades\Storage;

class EventRegistrationController extends Controller
{
    public function register(EventRegistrationRequest $request){
        $data = $request->validated();
        //Storage::append('Event-registration.csv', json_decode($data));
        return[
            'Success' => 'Registration completed'
        ];
    }
}
