<?php

namespace App\Models;
use App\Models\Maintenance;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Realty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
//lease - unit : many to many // unit - tenant  many to many // reality owner  - unit  one to many

    use HasFactory;
    protected $guarded=[];
       public function type()
    {
        return $this->belongsTo(type::class);
    }
    public function tenants()
    {
        return $this->belongsToMany(Tenant::class,'un_tns','tn_id','un_id');
    }
    public function Maintenance()
    {
         return $this->hasMany(App\Models\Maintenance::class,'unit_id','id');
    }
    public function leases()
    {
        return $this->hasMany(Lease::class,'unit_id','id');
    }
    public function realties()
    {
        return $this->belongsTo(Realty::class,'realty_id','id');
    }
}
