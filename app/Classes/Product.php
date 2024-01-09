<?php

namespace App\Classes;
use App\Notifications\ProductNotification;
use Illuminate\Notifications\Notifiable;

class Product{
    use Notifiable;
    public $email = 'example@example.com';
    public function __construct(){
        $this->notify(new ProductNotification);
    }
}