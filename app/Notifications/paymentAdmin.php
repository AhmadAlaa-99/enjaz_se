<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Payments;
use App\Models\User;
use App\Models\Tenant;

class paymentAdmin extends Notification
{
    use Queueable;
    public $tenant;
    public $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tenant $tenant,Payments $payment)
    {
        $this->tenant=$tenant;
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
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toMail($notifiable)
    {
        /*
         return (new MailMessage)->view('Notifications.paymentAdmin')->with([
                    'payment'=>$this->payment,
                    ]);
                    */
    }
     public function toDatabase($notifiable)
    {


        return [
            'title'=>' اشعار بصدورر فاتورة قسط ايجار - رقم سجل العقد:',
             'body'=>'تحقق من التفاصيل',
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
