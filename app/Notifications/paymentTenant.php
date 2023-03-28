<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Payments;
use App\Models\User;
use App\Models\Tenant;

class paymentTenant extends Notification
{
    use Queueable;
    public $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Payments $payment)
    {

        $this->payment=$payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail','database'];
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
             ->subject('فاتورة دفع قسط ايجار')->view('Notifications.paymentTenant', ['payment' => $this->payment]);
    }
     public function toDatabase($notifiable)
    {


        return [
           'title'=>'صدور فاتورة قسط دفع عقد الايجار',
             'body'=>'تحقق من التفاصيل',
           // 'url'=>url('http://127.0.0.1:8000/Tenant/tn_lease.details/'.$this->payment->lease_id),
           'url'=>route('tn_lease.details',$this->payment->lease_id),

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
