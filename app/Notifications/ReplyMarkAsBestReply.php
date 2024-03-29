<?php

namespace LaravelForum\Notifications;

use Illuminate\Bus\Queueable;
use LaravelForum\Disccussion;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReplyMarkAsBestReply extends Notification
{
    use Queueable;
    public $disccussion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Disccussion $disccussion)
    {
        return $this->disccussion = $disccussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail' , 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'disccussion' => $this->disccussion
        ];
    }
}
