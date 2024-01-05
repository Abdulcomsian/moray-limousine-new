<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class BookingNotification extends Notification
{
    use Queueable;

    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public function __construct($details)
    public function __construct()
    {
        // $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
        ->line("This is the test Email");
            // ->greeting(new HtmlString($this->details['greeting']))
            // ->subject($this->details['subject'])
            // ->view('mail.bookingemail',['details'=> $this->details,'url'=>url($this->details['action_url'])]);
            /*->line($this->details['body'])
            ->action($this->details['action_text'], url($this->details['action_url']))
            ->line($this->details['thanks_text']);*/
    }


    public function toDatabase($notifiable)
    {
        return [
            'greeting' => $this->details['greeting'],
            'body' => $this->details['body'],
            'thanks_text' => $this->details['thanks_text'],
            'actionLink' => $this->details['action_text'], $this->details['action_url']
        ];

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
            //
        ];
    }
}
