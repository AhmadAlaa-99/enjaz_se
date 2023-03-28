<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Broker extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function broker()
    {
        return $this->hasOne(User::class,'email','email');
    }
}
