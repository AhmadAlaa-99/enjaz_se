<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;
use App\Models\Units;
use App\Models\contract;


class Lease extends Model
{
    use HasFactory;
    protected $guarded=[];
   protected $casts = [ 'end_rental_date'=>'datetime'];
    public function tenants()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }

    public function units()
    {
        return $this->belongsTo(Units::class,'unit_id','id');
    }

    public function realties()
    {
        return $this->belongsTo(Realty::class,'realty_id');
    }
    public function Commitments()
    {
        return $this->belongsTo('App\Models\Commitments','lease_id','commitments_id');
    }
    public function payments()
    {
        return $this->belongsTo('App\Models\Payments','lease_id','payments_id');
    }
    public function financial()
    {
        return $this->belongsTo('App\Models\Financial_statements','financial_id');
    }

       public function contracts()
    {
        return $this->belongsTo(contract::class,'contract_id','id');
    }

}
