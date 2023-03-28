<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Realty;
use App\Http\Requests\ContractRequest;
use App\Models\contract;
use App\Models\ensollments;
use App\Models\Owner;
use App\Models\quarter;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use File;
use Carbon\Carbon;

class ContractController extends Controller
{
    public function contract_effictive()
   {


       $contract_active=contract::where('type_s','جاري')->count();
              $contract_expired=contract::where('type_s','منتهي')->count();
          $contracts=contract::all();
              $contracts_cost=0;
              $remain_cost=0;
       foreach($contracts as $contract)
       {
             $contracts_cost+=$contract->rent_value;
             $remain_cost+=$contract->remain;

       }


    $contracts=contract::with('realty')->where('status','جديد')->orwhere('status','مجدد')->latest()->paginate(5);

      return view('Admin.Leases.contract_effictive')->with([
        'contracts'=>$contracts,
        'contract_active'=>$contract_active,
        'contract_expired'=>$contract_expired,
        'contracts_cost'=>$contracts_cost,
        'remain_cost'=>$remain_cost,


      ]);
   }

    public function contract_finished()
   {
     $contract_active=contract::where('type_s','جاري')->count();
              $contract_expired=contract::where('type_s','منتهي')->count();
          $contracts=contract::all();
              $contracts_cost=0;
              $remain_cost=0;
       foreach($contracts as $contract)
       {
             $contracts_cost+=$contract->rent_value;
             $remain_cost+=$contract->remain;
       }
    $contracts=contract::with('realty')->where('status','منتهي')->latest()->paginate(5);

      return view('Admin.Leases.contract_finished')->with([
        'contracts'=>$contracts,
        'contract_active'=>$contract_active,
        'contract_expired'=>$contract_expired,
        'contracts_cost'=>$contracts_cost,
        'remain_cost'=>$remain_cost,

      ]);
   }

   public function payment_add(Request $request,$id)
  {
 try{
    $ensollments=ensollments::where('contract_id',$id)->count();
    $contract=contract::where('id',$id)->first();

    $paid=$contract->paid+$request->amount;
    if($paid>$contract->rent_value)
    {

        session()->flash('max_rent', 'حدث خطأ - المبلغ المدفوع أكبر من المتبقي');
        return back();
    }
    else if($ensollments>=$contract->ensollments_total)
    {
        session()->flash('max_count', 'حدث خطأ - يرجى تحقق من عدد الأقساط الكلية');
        return back();
    }
    else
    {
                $input['contract_id']=$id;
                $input['installmentNo']=$request->installmentNo;
                $input['installment_date']=$request->installment_date;
                $input['payment_date']=$request->payment_date;
                $input['amount']=$request->amount;
                $input['payment_type']=$request->payment_type;
                $input['refrenceNo']=$request->refrenceNo;
                ensollments::create($input);

                $contract=contract::where('id',$id)->first();

                $contract->update([
                'paid'=>$paid,
                'remain'=>$contract->rent_value-$paid,
                'ensollments_paid'=>$contract->ensollments_paid++,

            ]);

           $enso= ensollments::where('id',$contract->id)->orderBy('installment_date', 'ASC')->get();
           foreach($enso as $ens)
           {

           // return Carbon::now();
           $ins=$ens->installment_date;
            $today=Carbon::now();
            if($ins=$today)
            {

                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;
           }
            return redirect()->back();
        }
    }
      catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

    public function details($id)
   {

    $contract=contract::where('id',$id)->first();
    $realty=Realty::where('id',$contract->realty_id)->first();
    $owner=Owner::where('id',$realty->owner_id)->first();
    $mentos=ensollments::where('contract_id',$contract->id)->get();
    return view('Admin.Leases.contract_details',compact('contract','realty','owner','mentos'));
   }
public function renew_contract($id)
{

    $contract=contract::where('id',$id)->first();
    return view('Admin.Leases.contract_renew')->with([
        'contract'=>$contract,
    ]);
}
public function renew_contracted(ContractRequest $request)
{
    try
    {
    $validated = $request->validated();
    $contract=contract::where('id',$request->contract_id)->first();
    $image_name='doc-'.time().'.'.$request->contract_file->extension();

         $request->contract_file->move(public_path('contracts'),$image_name);
    if($contract->type=='تجاري')
                {
                contract::create([
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'fee'=>$request->fee,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>"تجاري",//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
                'status'=>"مجدد",
                'remain'=>$request->rent_value,
                'ensollments_total'=>$request->ensollments_total
            ]);
        }
        else
        {
                 contract::create([
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'fee'=>$request->fee,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>"سكني",//تجاري - سكني
                'note'=>$request->note,
                'status'=>"مجدد",
                'remain'=>$request->ejar_cost,
                'ensollments_total'=>$request->ensollments_total
             ]);
        }


            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                 $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }
             $contract=contract::latest()->first();
           $enso= ensollments::where('id',$contract->id)->orderBy('installment_date', 'ASC')->get();
           foreach($enso as $ens)
           {
           // return Carbon::now();
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
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count
            ]);
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
        }
          catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

}
public function finish_contract($id)
{
    try{
    $contract=contract::where('id',$id)->update(['type_s'=>"منتهي",'status'=>"منتهي"],);
    return redirect()->route('contract_finished')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
        }
          catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

}


   public function down_contract_file($id)
   {
    try{
      $file_name=contract::select('contract_file')->where('id',$id)->latest()->paginate(5);
        foreach($file_name as $file)
        {
            $path=public_path().'/contracts/'.$file->contract_file;
        }

         return Response::download($path);
    }
      catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
   }



   public function contract_residential()
   {
      $type="سكني";
      $quarter=quarter::all();
      return view('Admin.Leases.contract_create')->with(['type'=>$type,'quarters'=>$quarter]);
   }
     public function contract_commercial()
   {

      $type="تجاري";
      $quarter=quarter::all();
      return view('Admin.Leases.contract_create')->with(['type'=>$type,'quarters'=>$quarter]);
   }
    public function contract_store(ContractRequest $request)
    {
        try{
        $validated = $request->validated();

       Owner::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'attribute_name'=>$request->attribute_name,
       ]);
       $owner=Owner::latest()->first();
        Realty::create([
                'realty_name'=>$request->realty_name,
                'owner_id'=>$owner->id,
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
                'contract_cost'=>$request->ejar_cost,

                ]);
                $realty=Realty::latest()->first();
                $image_name='doc-'.time().'.'.$request->contract_file->extension();

                $request->contract_file->move(public_path('contracts'),$image_name);

                if($request->type_sc=='تجاري')
                {

                contract::create([
                'realty_id'=>$realty->id,
                'fee'=>$request->fee,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
                'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->rent_value,
            ]);
        }
        else
        {

             contract::create([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'fee'=>$request->fee,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                  'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
                 'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->ejar_cost,

             ]);
        }

            $contract=contract::latest()->first();
            $count=0;
            $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }

           $enso= ensollments::where('id',$contract->id)->orderBy('installment_date', 'ASC')->get();
           foreach($enso as $ens)
           {
           // return Carbon::now();
           $ins=$ens->installment_date;
            if(Carbon::now()<=$ins)
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;
           }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count,
            ]);
              if($request->input('action')=='save')
            {
                 return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

            }
            else
            {
                $type="تجاري";
                return view('Admin.Leases.add_commercial')->with([
                'owner'=>$owner,
                'realty'=>$realty,
                'type'=>$type,


            ]);
        }
    }
      catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
    }
     public function contract_edit(Request $request,$id)
     {
        try{
        // contract:realty_id realty:owner_id  ensoll:contract_id    owner
        $quarter=quarter::all();
        $contract= DB::table('contracts')
          ->join('realties', 'realties.id', '=', 'contracts.realty_id')
          ->where('contracts.id', $id)
          ->first();

          $realty=Realty::where('id',$contract->realty_id)->first();
    $ensollments=ensollments::where('contract_id',$id)->get();
      $owner=owner::where('id',$realty->owner_id)->first();
        return view('Admin.Leases.contract_edit')->with([
            'contract'=>$contract,
            'owner'=>$owner,
            'ensollments'=>$ensollments,
            'realty'=>$realty,
            'quarters'=>$quarter,
        ]);
     }
       catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
    }

    public function contract_update(Request $request)
    {
        try{

        $contract= DB::table('contracts')
          ->join('realties', 'realties.id', '=', 'contracts.realty_id')
          ->where('contracts.id', $request->contract_id)
          ->first();
          $owner=owner::where('id',$contract->realty_id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'attribute_name'=>$request->attribute_name,
       ]);
       $owner=Owner::latest()->first();
        Realty::where('id',$contract->realty_id)->update([
                'realty_name'=>$request->realty_name,
                'owner_id'=>$owner->id,
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
                 'contract_cost'=>$request->ejar_cost,

                ]);
                $realty=Realty::latest()->first();

                if($request->hasfile('contract_file'))
                {
                $image_name='doc-'.time().'.'.$request->contract_file->extension();

                $request->contract_file->move(public_path('contracts'),$image_name);

                }
                else{
                    $image_name=$contract->contract_file;
                }


                if($contract->type=='تجاري')
            {
            contract::where('id',$request->contract_id)->update([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'fee'=>$request->fee,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>'تجاري',//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
                'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->rent_value,
            ]);
        }
        else
        {
            contract::where('id',$request->contract_id)->update([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'fee'=>$request->fee,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                  'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>'سكني',//تجاري - سكني
                'note'=>$request->note,
                 'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->ejar_cost,

             ]);
        }

           $contract=contract::where('id',$request->contract_id)->first();
           $count=0;
           $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::where('refrenceNo',$request->refrenceNo[$key])->update($input);
            }
            $enso=ensollments::where('contract_id',$contract->id)->get();
           foreach($enso as $ens)
           {
           // return Carbon::now();
           $ins=$ens->installment_date;
            if(Carbon::now()<=$ins)
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;
           }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count,
            ]);
              return redirect()->route('contract_details',$contract->id);

        }
          catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }



}
public function add_commercial(Request $request)
{
try{
     Owner::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'attribute_name'=>$request->attribute_name,
       ]);
       $owner=Owner::latest()->first();
        Realty::create([
                 'realty_name'=>$request->realty_name,
                'owner_id'=>$owner->id,
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
                'contract_cost'=>$request->ejar_cost,
                ]);
                $realty=Realty::latest()->first();
                $image_name='doc-'.time().'.'.$request->contract_file->extension();
                $request->contract_file->move(public_path('contracts'),$image_name);
             contract::create([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'fee'=>$request->fee,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                  'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
                 'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->ejar_cost,

             ]);


            $contract=contract::latest()->first();
            $count=0;
            $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }
           $enso= ensollments::where('id',$contract->id)->orderBy('installment_date', 'ASC')->get();
           foreach($enso as $ens)
           {
           // return Carbon::now();
           $ins=$ens->installment_date;
            if(Carbon::now()<=$ins)
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;
           }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count,
            ]);
        }
          catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }



}
public function store_commercial(Request $request)
 {
    try{

                 $owner=Owner::latest()->first();
                $realty=Realty::latest()->first();
                $image_name='doc-'.time().'.'.$request->contract_file->extension();
                $request->contract_file->move(public_path('contracts'),$image_name);
                contract::create([
                'realty_id'=>$realty->id,
                'fee'=>$request->fee,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
                'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->rent_value,
            ]);
            $contract=contract::latest()->first();
            $count=0;
            $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }

           $enso= ensollments::where('id',$contract->id)->orderBy('installment_date', 'ASC')->get();
           foreach($enso as $ens)
           {
           // return Carbon::now();
           $ins=$ens->installment_date;
            if(Carbon::now()<=$ins)
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;
           }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count,
            ]);
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
 }

   catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
}

public function contract_payments()
{
    return 'test';
}

}
