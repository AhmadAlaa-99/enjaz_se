<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Units;
use Auth;
use Carbon\Carbon;

class MainTenancesController extends Controller
{
    public function requestMe()
    {

        return view('Tenant.MainTenance.requestForm');
    }

    public function sendRequest(Request $request,$id)
    {

    }
    public function accept(Request $request,$id)
    {
        try{
       $m=Maintenance::where('id',$id)->update([
            'status'=>'0',
            'cost'=>$request->cost,
         'notes'=>$request->notes,
            'response_date'=>Carbon::now(),
            'status'=>'completed',
        ]);
        $mn=Maintenance::where('id',$id)->first();
        $unit=Units::where('id',$mn->unit_id)->update([
          'maint_cost'=>$mn->cost,
        ]);


        //send notify TenantMail
      //  Notification::send($owner,new \App\Notifications\MaintAcceptNotify($user));
      return redirect()->route('accept_requests');
    }
    catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
    public function refuse($id)
    {
        Maintenance::where('id',$id)->update([
            'status'=>'-1',
           // 'cost'=>$request->cost,
           'notes'=>$request->notes,
            'response_date'=>Carbon::now(),
        ]);
        //send notify TenantMail
        Notification::send($owner, new \App\Notifications\MaintRefuseNotify($user));

    }






    public function accept_requests() //1
    {
        try{

        $maints=Maintenance::where('status','completed')->with('units')->latest()->paginate(5);
        return view('Admin.MainTenance.accepted',compact('maints'));
        }
        catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
    public function refuse_requests() //2
    {
        try{

       $maints=Maintenance::where('status','2')->with('units')->latest()->paginate(5);
        return view('Admin.MainTenance.refuse',compact('maints'));
        }
        catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }

    public function wait_request() //0
    {
         $maints=Maintenance::where('status','progress')->with('units')->latest()->paginate(1);
        return view('Admin.MainTenance.wait',compact('maints'));
    }
    public function maint_response(Request $request,$id)
    {
        try{
         Maintenance::where('id',$id)->update([
            'status'=>'completed',
            'cost'=>$request->cost,
            'notes'=>$request->notes,
            'response_date'=>Carbon::now(),
        ]);
        $maint=Maintenance::where('id',$id)->first();
        $unit=Units::where('id',$maint->unit_id)->first();
        $unit->update(['maint_cost'=>$unit->maint_cost+$request->maint_cost]);
         return redirect()->route('wait_request')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
        }
        catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }








    public function TenantRequest() //Tenant
    {
        $maintenance=Maintenance::where('tenant_id',Auth::user()->id)->latest()->paginate(5);
        return view('Admin.Tenant.MainTenance.index,',compact('maintenance'));

    }
}
