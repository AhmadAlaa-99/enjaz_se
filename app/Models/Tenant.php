<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lease;
use App\Models\Units;
class Tenant extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function leases()
    {
         return $this->hasMany(Lease::class,'tenant_id');
    }
    public function units()
    {
     return $this->belongsTo(Units::class,'unit_id');
    }
    public function user()
    {
     return $this->belongsTo(User::class,'user_id');
    }
}
