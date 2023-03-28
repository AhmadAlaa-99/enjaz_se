<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Broker;
use App\Models\Payments;
use App\Models\Realty;
use App\Models\Lease;
use App\Models\Units;
use App\Models\quarter;
use App\Models\Nationalitie;
use App\Models\contract;
use App\Models\type;


use DB;
use Auth;
use Hash;

class SettingsController extends Controller
{
     public function Account_settings()
     {
         $user=Auth::user();
         return view('settings.account',compact('user'));
     }

     public function Account_edit(Request $request)
     {
         $user=Auth::user();
        $user->update([
            'name'=>$request->name,
            'ID_type'=>$request->ID_type,
            'ID_num'=>$request->ID_num,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
               return view('settings.account',compact('user'));
     }
      public function company_settings()
     {
         $company=Broker::first();

         return view('settings.company',compact('company'));
     }
      public function company_settings_store(Request $request)
     {
          $company=Broker::first();
          $company->update([
              'date_founded'=>$request->date_founded,
              'about'=>$request->about,
              'vision'=>$request->vision,
              'mission'=>$request->mission,
              'contact_email'=>$request->contact_email,
              'contact_address'=>$request->contact_address,
              'contact_mobile'=>$request->contact_mobile,
          ]);

         return view('settings.company',compact('company'));
     }
      public function privacy_settings()
     {
          return view('settings.privacy');
     }
      public function privacy_settings_store(Request $request)
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
return redirect()->route('privacy_settings')
->with('success','تم تغيير كلمة السر بنجاح');

     }
      public function notifications_settings()
     {
         $user=User::where('role_name','Admin')->first();
          return view('settings.notifications',compact('user'));
     }


















     public function profile()
     {
        return view('Profile');
     }
      public function site_setting()
     {
        return view('Admim.Setting.social');
     }

public function site_data()
{
    $quarters=DB::table('quarters')->get();
    $nationalities=DB::table('nationalities')->get();
    $types=DB::table('types')->get();

    return view('Admin.System.data')->with([
        'quarters'=>$quarters,
        'nationalities'=>$nationalities,
         'types'=>$types,
    ]);
}

     public function statistics()
     {
        $user=Auth::user();
        if($user->role_name=='Tenant')
        {
           return redirect()->route('leases_tenant');
        }
        else
        {
        $realties=Realty::count();

         $units=Units::count();

         $leases_count=Lease::where('status','active')->count();

         $contracts=Contract::count();

         $contr=DB::table('contracts')->get();
         $contracts_payments=0;
         foreach($contr as $rec) {$contracts_payments+=$rec->rent_value;}

         $query=DB::table('payments')->get();
         $proceeds=0;
         $receivs=0;
         foreach($query as $rec) { $proceeds+=$rec->paid;  $receivs+=$rec->remain;}

         $maints=DB::table('maintenances')->get();
         $maintenances=0;
         foreach($maints as $rec) {  $maintenances+=$rec->cost;}

         $payments=DB::table('payments')->join('leases','payments.lease_id','leases.id')
         ->orderBy('release_date')->take(5)->get();
         $leases=Lease::take(5)->get();
         return view('statistics')->with([
            'realties'=>$realties,
            'units'=>$units,
            'leases_count'=>$leases_count,
            'contracts'=>$contracts,
            'contracts_payments'=>$contracts_payments,
            'proceeds'=>$proceeds,
            'receivs'=>$receivs,
            'maintenances'=>$maintenances,
            'payments'=>$payments,
            'leases'=>$leases,
        ]);
    }
     }
     public function add_quarters(Request $request)
     {
           foreach($request->quarter_name as $key=>$items )
            {
                $input['name']=$request->quarter_name[$key];
                quarter::create([
                    'name'=> $input['name'],
                ]);

            }
            return redirect()->route('site_data');
     }
     public function edit_quarter(Request $request)
     {
        $quarter=quarter::where('id',$request->id)->first();
        $quarter->update([
            'name'=>$request->name_quarter,
        ]);
        return redirect()->route('site_data');
     }
       public function add_nationalist(Request $request)
     {
           foreach($request->national_name as $key=>$items )
            {
                $input['national_name']=$request->national_name[$key];
                Nationalitie::create([
                    'Name'=> $input['national_name'],
                ]);

            }
            return redirect()->route('site_data');
     }
     public function edit_national(Request $request)
     {
        $quarter=Nationalitie::where('id',$request->id)->first();
        $quarter->update([
            'Name'=>$request->name_national,
        ]);
        return redirect()->route('site_data');
     }
          public function add_types(Request $request)
     {
           foreach($request->type_name as $key=>$items )
            {
                $input['type_name']=$request->type_name[$key];
                type::create([
                    'Name'=> $input['type_name'],
                ]);

            }
            return redirect()->route('site_data');
     }
     public function edit_type(Request $request)
     {

        $quarter=type::where('id',$request->id)->first();
        $quarter->update([
            'Name'=>$request->name_type,
        ]);
        return redirect()->route('site_data');
     }

}
