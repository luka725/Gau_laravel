<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Order Placed - Order ID: ' . $notifiable->id)
            ->line('Thank you for placing an order!')
            ->line('Order ID: ' . $notifiable->id)
            ->action('View Order', route('user.orders'))
            ->line('We appreciate your business.');
    }
}
