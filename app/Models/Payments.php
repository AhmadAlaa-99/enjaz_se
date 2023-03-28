<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $guarded=[];
     protected $casts = [
    'release_date' => 'date:m/d/Y',
    ];
    public function lease()
    {
        return $this->hasOne('App\Models\Lease','lease_id','payments_id');
    }
}
