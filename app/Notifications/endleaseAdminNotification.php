<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Lease;

class endleaseAdminNotification extends Notification
{
    use Queueable;
    protected $lease;
    /** jkj
     *
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lease $lease)
    {
        $this->lease=$lease;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
       // return ['mail','database'];
         return ['database'];
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
             ->subject('انتهاء عقد ايجار')->view('Notifications.endleaseAdminNotificationt', ['lease' => $this->lease]);
    }

    public function toDatabase($notifiable)
    {


        return [
             'title'=>' اشعار بانتهاء عقد ايجار',
             'body'=>'تحقق من التفاصيل',
         //    'url'=>url('http://127.0.0.1:8000/Admin/lease_details/'.$this->lease->id),
         'url'=>route('lease.details',$this->lease->id),
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
