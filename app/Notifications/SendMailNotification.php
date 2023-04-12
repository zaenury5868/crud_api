<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendMailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $body;
    protected $content;
    protected $type;
    // protected $replyToAddress;
    public function __construct($body, $type)
    {
        $this->body = $body;
        $this->type = $type;
        // $this->replyToAddress = env('MAIL_FROM_ADDRESS');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if($this->body['type'] == 'created') {
            $this->content = $this->body['name'] . ' berhasil ' . $this->body['action'] .' '. $this->body['name_category'];
        } else {
            $this->content = $this->body['name'] . ' berhasil ' . $this->body['action'] .' '. $this->body['name_category'];
        }

        return (new MailMessage)
            ->subject('Notifikasi status kategori')
            ->line($this->content)
            ->from(env('MAIL_FROM_ADDRESS'));
            // ->replyTo($this->replyToAddress);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => $this->body,
            'type' => $this->type
        ];
    }
}
