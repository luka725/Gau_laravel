<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationNotification extends Notification
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome to YourApp')
            ->line('Welcome, ' . $this->user->name . '!')
            ->line('Thank you for registering on YourApp.')
            ->line('We are excited to have you as part of our community.')
            ->line('Feel free to explore and enjoy your experience with YourApp!')
            ->action('Visit YourApp', url('/'));
    }

}
