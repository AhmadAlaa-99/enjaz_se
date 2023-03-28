<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\ensollments;
use App\Models\User;

class releseContractPayment extends Notification implements ShouldQueue,ShouldBroadcast
{
    use Queueable;
    public $ensollment;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,$ensollment)
    {
        $this->ensollment=$ensollment;
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
      //  return ['database','mail','broadcast'];
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
                        ->subject('New Invoice')->view('Notifications.mailreleaseContract', ['ensollment' => $this->ensollment]);


    }

    public function toDatabase($notifiable)
    {


        return [

            'title'=>'تم اصدار فاتورة تسديد قسط الاستئجار - ',
            'body'=>'تحقق من التفاصيل',
          //  'url'=>url('http://127.0.0.1:8000/Admin/contract_details/'.$this->ensollment->contract_id),
          'url'=>route('contract_details',$this->ensollment->contract_id),

          //  'url'=>url('http://127.0.0.1:8000/Acontract_details/'.$this->ensollment->contract_id),
        ];
    }
/*
    public function toBroadcast($notifiable)
    {
        $addr = $this->order->billingAddress;
        return new BroadcastMessage([
            'body' => "A new order (#{$this->order->number}) created by {$addr->name} from {$addr->country_name}.",
            'icon' => 'fas fa-file',
            'url' => url('/dashboard'),
            'order_id' => $this->order->id,
        ]);
    }
    */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
     public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'title'=>'اشعار بصدور فاتورة تسديد قسط الاستئجار - ',
            'body'=>'تحقق من التفاصيل',
            'url'=>url('http://127.0.0.1:8000/Admin/contract_details/'.$this->ensollment->contract_id),
            ]
        ]);
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
