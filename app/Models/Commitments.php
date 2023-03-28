<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lease;
class Commitments extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function lease()
    {
        return $this->hasOne(Lease::class,'lease_id','commitments_id');
    }
}
