<?php

namespace App\Console\Commands;
use App\Models\Lease;
use App\Models\Payments;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\contract;
use App\Models\ensollments;
use App\Models\User;
use App\Notifications\releseContractPayment;
use App\Notifications\endContractNotification;
use App\Notifications\endleaseAdminNotification;
use App\Notifications\endleaseTenantNotification;
use App\Notifications\paymentAdmin;
use App\Notifications\paymentTenant;


use Illuminate\Console\Command;
use DB;

class Expre_Lease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lease:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test leases expire every day in 12 am';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //تاريخ اصدار القسط القادم في عقد الايجار
        $leases=Lease::where('status','active')->get();
        foreach($leases as $lease)
        {
            $payments=Payments::where('lease_id',$lease->id)->get();
            foreach($payments as $payment)
            {
               $now=Carbon::now();
               $date=$payment->release_date;
               if($now<=$date)
            {
                $next_payment=$payment->release_date;
                $lease->update(['next_payment'=>$next_payment]);
                 $tenant=Tenant::where('unit_id',$lease->unit_id)->first();
                 $tenant->update([
                 'next_payment'=>$next_payment,
           ]);
                break;
            }
            continue;
           }
        }
            //تاريخ اصدار القسط القادم في عقد الاستئجار
            $contracts=contract::where('type_s','جاري')->get();
            foreach($contracts as $contract)
            {
                 $enso= ensollments::where('contract_id',$contract->id)->orderBy('installment_date', 'ASC')->get();
                 foreach($enso as $ens)
           {
            $ins=$ens->installment_date;
            $today=Carbon::now();
            if($today<=$ins)
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;

            }
           }

                //اشعار للادمن تخبره بصدور قسط استئجار
            
              $ensoll=ensollments::get();
                foreach($ensoll as $ensol)
              {
                 $ensol=ensollments::where('id',$ensol->id)->first();
                if($ensol->installment_date->isToday())
                {
                      $user=User::where('role_name','Admin')->first();
                      $user->notify(new releseContractPayment($user,$ensol));
                }
                  }
            //اشعار للمستأجر والادمن تخبره بانتهاء عقد الايجار
           foreach($leases as $lease)
           {
            $date=Carbon::now();
              if($lease->end_rental_date->isToday())
               {
                $user=User::where('role_name','Admin')->first();
                $tenant=User::where('id',$lease->tenants->user_id)->first();
                $tenant->notify(new endleaseTenantNotification($lease));
                $user->notify(new endleaseAdminNotification($lease));
               }
           }
            //اشعار للمستأجر تخبره بصدور فاتورة دفع
            foreach($leases as $lease)
           {
            $payments=Payments::where('lease_id',$lease->id)->get();
            foreach($payments as $payment)
            {
               $date=$payment->release_date;
               if($date->isToday())
            {
                $tenant=User::where('id',$lease->tenants->user_id)->first();
            
            }
           }
           }


        }
    }
