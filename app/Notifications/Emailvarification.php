<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use App\Models\User;
use DB;

class Emailvarification extends Notification
{
    use Queueable;

    private $token;
    private $expire;
    private $email;
    private $user_type;
    private $user_location;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $expiration, $email)
    {

        $this->token = $token;
        $this->expire = $expiration;
        $this->email = $email;
        $user = User::where('email', $email)->first();
        $this->user_type = $user;
        $record = DB::table('user_location')
            ->join('locations', 'locations.id', '=', 'user_location.location_id')
            ->where('user_id',  $user->id)->first();
        if ($record) {
            $this->user_location = $record->location_city;
        } else {
            $this->user_location = '';
        }
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
            ->greeting("")
            ->subject("Email Verification")
            ->view('mail.verifyemail', ['token' => $this->token, 'expiredate' => $this->expire, 'email' => $this->email, 'user' => $this->user_type, 'location' => $this->user_location]);
    }


    public function toDatabase($notifiable)
    {
        return [
            'greeting' => "",
            'body' => "",
            'thanks_text' => "",
            'actionLink' => ""
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
