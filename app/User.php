<?php

namespace App;

use App\Country;
use App\Gender;
use App\UserInfo;
use App\color;
use App\Filters\QueryFilter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters){
        return $filters->apply($builder);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
