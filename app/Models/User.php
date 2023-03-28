<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Broker;
use App\Models\Nationalitie;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class,'email','email');
    }
    protected $guarded=[];

/*
'name', 'email', 'password','role_name','Status'
*/
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
      public function receivesBroadcastNotificationsOn()
    {
        return 'App.User.'.$this->id;
    }
}
