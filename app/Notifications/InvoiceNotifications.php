<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class InvoiceNotifications extends Notification
{
    use Queueable;

    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
            ->greeting("hello")
            ->subject("Booking Invoice")
            ->view('mail.invoicemail', ['details' => $this->details])
            ->attach(public_path('pdf/' . $this->details['body']['filename']), [
                'as' => 'invoice.pdf',
                'mime' => 'text/pdf',
            ]);
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
