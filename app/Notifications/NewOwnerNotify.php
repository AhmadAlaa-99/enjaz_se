<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\organization;
use App\Models\User;
class NewOwnerNotify extends Notification
{
    use Queueable;
    private  $pass;
    private $organization;
    private $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,organization $organization,$pass)
    {
        $this->pass=$pass;
        $this->organization=$organization;
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $body=sprintf(
            'My Dear %s You have been accepted as a Owner in our team your account
            email : %s
            password :%s ',
            $this->user->name,
            $this->user->email,
            $this->pass,

            );
        return (new MailMessage)
        ->line($body)
        ->line('Thank you ');



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
