<?php

namespace App\Models;
use App\Models\Realty;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;
    protected $guarded=[];
      public function realty()
    {
        return $this->belongsTo(Realty::class,'realty_id','id');
    }
     public function leases()
    {
        return $this->hasMany(Lease::class,'contract_id','id');
    }

}
