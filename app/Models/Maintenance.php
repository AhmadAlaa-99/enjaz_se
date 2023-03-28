<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Units;

class Maintenance extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function units()
    {
        return $this->belongsTo(Units::class,'unit_id');
    }
}
