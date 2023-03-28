<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Lease_units;
use App\Models\receives;
use App\Models\Lease;
use App\Models\Realty;
use App\Models\Units;
use App\Models\Tenant;
use DB;
use App\Http\Controllers\Controller;
class receive_reports extends Controller
{
    public function index()
    {
        $query=DB::table('payments')->get();
         $leases_payments=0;

        foreach($query as $proc)
        {   $leases_payments+=$proc->paid; }
        $finished=Lease::where('status','expired')->orwhere('status','received')->count();
$effictive=Lease::where('status','active')->count();
$rec_account=Lease::where('status','received')->count();

        $receives=receives::with('unit','lease')->latest()->paginate(5);

        return view('Admin.Receives_Reports.index')->with([
            'receives'=>$receives,
            'finished'=>$finished,
            'effictive'=>$effictive,
            'rec_account'=>$rec_account,
            'leases_payments'=>$leases_payments,




        ]);
    }

    public function create($id)
    {

        $lease=Lease::where('id',$id)->first();
        return view('Admin.Receives_Reports.create',compact('lease'));
    }
    public function details($id)
    {
       $receive=receives::with('unit','lease')->where('id',$id)->first();
        return view('Admin.Receives_Reports.details',compact('receive'));
    }
    public function store(Request $request)
    {

        $unit=Lease::where('id',$request->lease_id)->first();
        $realty=Realty::where('id',$unit->realty_id)->first();

        receives::create([
            //'lease_number'=>$request->lease_number,
            'unit_id'=>$unit->unit_id,
            'lease_id'=>$request->lease_id,
            'receive_date'=>$request->receive_date,
            'paymennts_status'=>$request->paymennts_status,
            'maint_status'=>$request->maint_status,
            'notes'=>$request->notes,
        ]);
        $unit=Units::where('id',$unit->unit_id)->update(['status'=>'empty']);
        $lease=Lease::where('id',$request->lease_id)->first();
          $realty->update([
            'total_proc'=>$realty->total_proc+=$lease->rent_value,
        ]);
        $lease->update(['status'=>'received']);
        $tenant=Tenant::where('id',$lease->tenant_id)->update(['status'=>'archived']);
        return redirect()->route('receives_reports.index')->with([
            'message' => 'receives_reports created successfully',
            'alert-type' => 'success',
        ]);

    }

    public function edit($id)
    {
        $receive=receives::where('id',$id)->first();
        return view('Admin.Receives_Reports.edit',compact('receive'));
    }
    public function update(Request $request,$id)
    {
        $receive=receives::where('id',$id)->first();
        $unit=Lease::where('id',$request->lease_id)->first();
        $receive->update([
            'unit_id'=>$unit->unit_id,
            'lease_id'=>$request->lease_id,
            'receive_date'=>$request->receive_date,
            'paymennts_status'=>$request->paymennts_status,
            'maint_status'=>$request->maint_status,
            'notes'=>$request->notes,
        ]);
         return redirect()->route('receives_reports.index')->with([
            'message' => 'receives_reports created successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        try {
            receives::destroy($id);

            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
