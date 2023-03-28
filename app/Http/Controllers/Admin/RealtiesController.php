<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Realty;
use App\Models\Units;
use App\Models\Lease;
use App\Models\contract;
use App\Models\User;
use App\Models\quarter;
use DB;

use Illuminate\Http\Request;

class RealtiesController extends Controller
{


public function realty_leasing_search(Request $request)
{
    try{
      $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
     $realty=Realty::where('id',$request->realty_id)->first();
     $leases=Lease::where('realty_id',$request->realty_id) ->where('st_rental_date','>=',$fromDate)
        ->where('st_rental_date','<=',$toDate)->where('status','active')->with('units','financial')->get();

   $proccees=0;
   $proccees_paid=0;

foreach($leases as $lease)
{
    $proccees+=$lease->financial->rent_value;
    $proccees_paid+=$lease->financial->paid;
}
   return view('Admin.Realties.realty_leasing')->with([
    'leases'=>$leases,
    'proccees'=>$proccees,
    'proccees_paid'=>$proccees_paid,
    'realty'=>$realty,
   ]);
    }
    catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
}
/*
public function realty_financial_search(Request $request)
{
    $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $realty=Realty::where('id',$id)->first();
   $leases=Lease::where('realty_id',$id)->where('status','active')->with('units','financial')->get();
   $contract=contract::where('realty_id',$id)->first();
   $proccees=0;
   $proccees_paid=0;
foreach($leases as $lease)
{
    $proccees+=$lease->financial->rent_value;
    $proccees_paid+=$lease->financial->paid;
}
   return view('Admin.Realties.realty_financial')->with([
    'leases'=>$leases,
    'proccees'=>$proccees,
    'proccees_paid'=>$proccees_paid,
    'realty'=>$realty,
    'contract'=>$contract
   ]);


}
*/

public function realty_leasing($id)
{
$realty=Realty::where('id',$id)->first();
$leases=Lease::where('realty_id',$id)->where('status','active')->with('units','financial')->get();

   $proccees=0;
   $proccees_paid=0;

foreach($leases as $lease)
{
    $proccees+=$lease->financial->rent_value;
    $proccees_paid+=$lease->financial->paid;
}
   return view('Admin.Realties.realty_leasing')->with([
    'leases'=>$leases,
    'proccees'=>$proccees,
    'proccees_paid'=>$proccees_paid,
    'realty'=>$realty,
   ]);
}
public function realty_financial($id)
{
   $realty=Realty::where('id',$id)->first();
   $leases=Lease::where('realty_id',$id)->where('status','active')->with('units','financial')->get();
   $contracts=contract::where('realty_id',$id)->with('leases')->get();

   //calculate ds
   $proccees=0;
   $proccees_paid=0;
foreach($leases as $lease)
{
    $proccees+=$lease->financial->rent_value;
    $proccees_paid+=$lease->financial->paid;
}
   return view('Admin.Realties.realty_financial')->with([
    'leases'=>$leases,
    'proccees'=>$proccees,
    'proccees_paid'=>$proccees_paid,
    'realty'=>$realty,
    'contracts'=>$contracts
   ]);
}
    public function index()
    {
           $count_realties = Realty::count();
              $count_units=Units::count();
              $count_units_added=Units::count();
        $count_units_rented=Units::where('status','rented')->count();



        $realties = Realty::latest()->paginate(5);
        if($realties->count()>0)
        {
        foreach($realties as $realty)
        {
            $units_tn= Units::where(['realty_id'=>$realty->id,'status'=>'rent'])->latest()->paginate(5);

        }
    }
    else
    {
        $units_tn='0';
    }
        return view('Admin.Realties.index')->with([
                  'realties'=>$realties,
                  'units_tn'=>$units_tn,
                  'count_realties'=>$count_realties,
                  'count_units'=>$count_units,
                  'count_units_added'=>$count_units_added,
                  'count_units_rented'=>$count_units_rented,
        ]);
    }


    public function show()
    {

    }
     public function create()
     {
//        $owners=User::where('role_name','Owner')->with('organization')->latest()->paginate(5);

       // $owners=User::where('role_name','Owner')->latest()->paginate(5);
        return view('Admin.Realties.create');

     }
     public function store(Request $request)
     {
        /* address type use roles units lifts parking envoy_id */


               $realty= Realty::create([
                'realty_name'=> $request->realty_name,
                'address'=> $request->address,
                'type'=> $request->type,
                'use'=> $request->use,
                'roles'=> $request->roles,
                'units'=> $request->units,
                'size'=> $request->size,
                'advantages'=> $request->advantages,
                ]);
               // return dd($realty);

            //toastr()->success(trans('messages.success'));
            return redirect()->route('realties.index')->with([
                'message' => 'Realty created successfully',
                'alert-type' => 'success',
            ]);





     }
     public function edit($id)
     {
        $quarters=quarter::all();
        $realty = Realty::where('id',$id)->first();
        return view('Admin.Realties.edit')->with([
            'quarters'=>$quarters,
            'realty'=>$realty,
        ]);

     }
     public function update(Request $request,$id)
     {
        try{
        $Realty=Realty::where('id',$id)->first();

        $Realty->update([
               'realty_name'=>$request->realty_name,
                'quarter_id'=>$request->quarter,
                'address'=>$request->address,
                'agency_name'=>$request->agency_name,
                'shopsNo'=>$request->shopsNo,
                'agency_mobile'=>$request->agency_mobile,
                  'elevator'=>$request->elevator,
                 'parking'=>$request->parking,
                'type'=> $request->type,
                'use'=> $request->use,
                'roles'=> $request->roles,
                'units'=> $request->units,
                'size'=> $request->size,
                'advantages'=> $request->advantages,
        ]);
        return redirect()->route('realties.index')->with([
            'message' => 'Realty edited successfully',
            'alert-type' => 'success',
        ]);
    }
    catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
     public function destroy($id)
     {
        try{
            Realty::destroy($id);
            return redirect()->route('realties.index')->with([
                'message' => 'Realty clean successfully',
                'alert-type' => 'success',
            ]);
     }
     catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
}
