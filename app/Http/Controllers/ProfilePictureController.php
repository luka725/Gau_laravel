<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfilePictureRequest;

class ProfilePictureController extends Controller
{
    public function add_picture(ProfilePictureRequest $request){
        $data = $request->file('picture');
        $path = $data->store('uploads');
        return[
            'Success' => 'profile picture upploaded successfully'
        ];
    }
}
