<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Tenant;
use App\Models\Units;
use App\Models\User;
use App\Models\Maintenance;
use Carbon\Carbon;
use App\Models\Lease;
use App\Models\commitments;
use App\Models\Payments;
class TenantController extends Controller
{



  public function settings()
    {
        $user=Auth::user();

         return view('Tenant.settings.account',compact('user'));
    }
      public function privacy()
    {

         return view('Tenant.settings.privacy');
    }
      public function change_password()
    {
        $user=Auth::user();
        $this->validate($request, [
        'current_password'=>'required',
        'new_password' => 'required|',
        'confirm_password' => 'required|same:new_password',
]);
$input = $request->all();
$input['new_password'] = Hash::make($input['new_password']);
$user->update(['password'=>$input['new_password']]);
         return view('Tenant.settings.privacy')->with('success','تم تغيير كلمة السر بنجاح');
    }


    public function leases()
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $leases=Lease::where('tenant_id',$tenant->id)->with('tenants','realties','units','financial')
        /*->select('number','type','st_rental_date','end_rental_date')*/->latest()->paginate(5);
         return view('Tenant.myleases',compact('leases'));
    }

    public function tn_lease_details($id)
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $lease=Lease::where('tenant_id',$tenant->id)->with('units','realties','financial')->where('id',$id)->first();
        $commitments=Commitments::where('id',$lease->commitment_id)->first();
        $tenant=Tenant::where('id',$tenant->id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->latest()->paginate(5);
        $broker=User::first();
        return view('Tenant.leases_details',compact('lease','tenant','payments','broker','commitments'));
    }






     public function request_form()
    {

        return view('Tenant.request_form');
    }

    public function request_send(Request $request)
    {
        $user=Auth::user();
        $tenant=Tenant::where('user_id',$user->id)->first();
        $real=Units::where('id',$tenant->units->id)->first();
        Maintenance::create([
            'desc'=>$request->desc,
            'tenant_id'=>$tenant->id,
            'unit_id'=>$tenant->units->id,
            'type'=>$request->type,

        'notes'=>'-',
            //'status'=> default(progress)
            'cost'=>'0',
            'total'=>'0',
            'request_date'=>Carbon::now(),
           'response_date'=>Carbon::now(),
        ]);
        //send notify to OwnerMail
        //$owner_id=Reality::where('id',$real_id)->pluck('owner_id');
       // $owner=User::where('id',$owner_id)->first();
      //  Notification::send($owner, new \App\Notifications\OwnerMaints($user));
        return redirect()->route('maints_requests');
    }

    public function maints_requests()
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $maintenances=Maintenance::where('tenant_id',$tenant->id)->latest()->paginate(5);
        return view('Tenant.maints_requests',compact('maintenances'));
    }


}
