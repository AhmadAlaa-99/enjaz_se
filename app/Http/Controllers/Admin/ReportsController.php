<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Realty;
use App\Models\Lease;
use App\Models\Payments;
use App\Models\Commitments;
use App\Models\Tenant;
use App\Models\Maintenance;
use App\Models\User;
use DB;
class ReportsController extends Controller
{
    public function contract_payments()
    {
          return view('Admin.Reports.contract_payments');
    }

    public function maintenance_payments()
    {
        $units=Units::where('maint_cost','!=','0')->paginate('5');
         return view('Admin.Reports.maintenance_payments',compact('units'));
    }

    public function receivables()
    {
       $query=DB::table('payments')->get();
         $all_procced=0;
         $rc=0;
         $cnt=0;
        foreach($query as $proc)
        {   $all_procced+=$proc->paid;  $cnt+=$proc->remain; }
        $contracts=DB::table('contracts')->get();
         foreach($contracts as $con){  $rc+=$con->rent_value;}
         $receivables=DB::table('payments')->join('leases','payments.lease_id','leases.id')->paginate(5);
        return view('Admin.System.receivables')->with([
            'all_procced'=>$all_procced,'rc'=>$rc,'cnt'=>$cnt,'receivables'=>$receivables,
        ]);
    }

    public function receivables_date(Request $request)
    {


        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $type=$request->input('type');
        if($type=="part")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('paid','==','0')->paginate('5');;
        }
        else if($type="total")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','!=','0')->paginate('5');;
        }
        else
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)->paginate('5');;
        }
        $all_receivables=0;

        foreach($query as $rec)
        {
              $all_receivables+=$rec->remain;
        }
        $querys=DB::table('payments')->get();
         $all_procced=0;
         $rc=0;
         $cnt=0;
        foreach($querys as $proc)
        {   $all_procced+=$proc->paid;  $cnt+=$proc->remain; }
        $contracts=DB::table('contracts')->get();
         foreach($contracts as $con){  $rc+=$con->rent_value;}

        return view('Admin.System.receivables')->with([
              'receivables'=>$query,
            'all_receivables'=>$all_receivables,
            'rc'=>$rc,'cnt'=>$cnt,'all_procced'=>$all_procced


        ]);

    }

    public function proceeds()
    {
        $query=DB::table('payments')->get();
         $all_procced=0;
         $rc=0;
         $cnt=0;
        foreach($query as $proc)
        {   $all_procced+=$proc->paid;  $cnt+=$proc->remain; }
        $contracts=DB::table('contracts')->get();
         foreach($contracts as $con){  $rc+=$con->rent_value;}
         $proceeds=DB::table('payments')->join('leases','payments.lease_id','leases.id')->paginate(5);
        return view('Admin.System.imports')->with([
            'all_procced'=>$all_procced,'rc'=>$rc,'cnt'=>$cnt,'proceeds'=>$proceeds,
        ]);

      }

    public function proceeds_date(Request $request)
    {
        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $type=$request->input('type');
        if($type=="part")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','!=','0')->paginate('5');;
        }
        else if($type="total")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','==','0')->paginate('5');;
        }
        else
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)->paginate('5');;
        }
        $all_procceds=0;

        foreach($query as $proc)
        {
              $all_procceds+=$proc->paid;
        }
         $querys=DB::table('payments')->get();
         $all_procced=0;
         $rc=0;
         $cnt=0;
        foreach($querys as $proc)
        {   $all_procced+=$proc->paid;  $cnt+=$proc->remain; }
        $contracts=DB::table('contracts')->get();
         foreach($contracts as $con){  $rc+=$con->rent_value;}

        return view('Admin.System.imports')->with([
             'proceeds'=>$query,
            'all_procceds'=>$all_procceds,
            'rc'=>$rc,'cnt'=>$cnt,'all_procced'=>$all_procced

        ]);

    }
    public function rental_traffic()
    {
        return view('Admin.Reports.rental_traffic');
    }
    public function details($id)
    {
        return view('Admin.Reports.details');
    }
    public function payments_details($id)
    {

       $payments= Payments::where('lease_id',$id)->latest()->paginate(5);

               $lease=Lease::where('id',$id)->first();
                    

       return view('Admin.Reports.payments_details',compact('payments','lease'));

    }

    public function lease_details()
    {
        return view('Admin.leases_details');

    }
    public function maintenance_details()
    {
        return view('Admin.maintenance_details');

    }


    public function realties_proceeds()
    {
          $query=DB::table('payments')->get();
         $all_procced=0;
         $rc=0;
         $cnt=0;
        foreach($query as $proc)
        {   $all_procced+=$proc->paid;  $cnt+=$proc->remain; }
        $contracts=DB::table('contracts')->get();
         foreach($contracts as $con){  $rc+=$con->rent_value;}
         $realties=DB::table('realties')->paginate(5);
        return view('Admin.Reports.realties_proceeds')->with([
            'all_procced'=>$all_procced,'rc'=>$rc,'cnt'=>$cnt,'realties'=>$realties,
        ]);

    }
     public function realty_leases($id)
    {

         $Lease=Lease::where('realty_id',$id)->with('tenants','realties','units','financial')->get();
        return view('Admin.Reports.realty_leases')->with(['leases'=>$Lease,]);

    }
    public function tenant_details($tenant_id)
    {
        $lease=Lease::with('units','realties','financial')->where(['id'=>$tenant_id,'status'=>'active'])->first();
        $commitments=Commitments::where('id',$lease->commitment_id)->first();
        $tenant=Tenant::where('id',$lease->tenant_id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->latest()->paginate(5);
        $broker=User::first();
        return view('Admin.Tenants.details',compact('lease','tenant','payments','broker','commitments'));
    }


}
