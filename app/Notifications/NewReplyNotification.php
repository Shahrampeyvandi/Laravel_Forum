<?php

namespace LaravelForum\Notifications;

use Illuminate\Bus\Queueable;
use LaravelForum\Disccussion;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyNotification extends Notification
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
        return ['mail', 'database'];
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
                    ->line('پاسخ جدید ارسال شد.')
                    ->action('مشاهده پاسخ', route('disccussion.show', $this->disccussion->slug))
                    ->line('با تشکر سایت ...');
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
            'disccuss' => $this->disccussion
        ];
    }
}
