<?php

namespace App\Models;
use App\Models\contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ensollments extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='rent_ensollments';
       protected $casts = [
    'installment_date' => 'date:m/d/Y',
    ];

      public function contract()
    {
        return $this->belongsTo(contract::class,'contract_id','id');
    }
}
