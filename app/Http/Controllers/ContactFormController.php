<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ContactFormRequest;

class ContactFormController extends Controller
{
    public function contact(ContactFormRequest $request):array
    {
        $data = $request->validated();
        Storage::append('Contact.txt', "name: {$data['name']}\nemail: {$data['email']}\nmessage: {$data['message']}\n" );
        return[
            'Success' => 'contact succesfully requested'
        ];
    }
}
