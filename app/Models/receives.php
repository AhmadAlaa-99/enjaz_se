<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lease;
use App\Models\Units;

class receives extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function lease()
    {
              return $this->belongsTo(Lease::class,'lease_id','id');
    }
    public function unit()
    {
             return $this->belongsTo(Units::class,'unit_id','id');
    }
}
