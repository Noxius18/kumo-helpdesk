<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiTiket extends Notification
{
    use Queueable;

    public $message;
    public $tiket;

    /**
     * Create a new notification instance.
     */
    public function __construct($message, $tiket)
    {
        $this->message = $message;
        $this->tiket = $tiket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'message' => $this->message,
            'tiket' => $this->tiket,
            'nama' => $this->tiket->user->nama
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
