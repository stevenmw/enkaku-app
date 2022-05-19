<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','confirm_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'confirm_password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,'id','account_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'id','account_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'id','account_id');
    }

    public function scopeIsAdmin($query){
       $query = $query->whereHas('admin', function (Builder $quer){
            $quer->where('account_id',auth()->user()->id);
       })->first();
       if($query){
           return true;
       }
       return false;
    }

    public function scopeIsDoctor($query){
        $query = $query->whereHas('doctor', function (Builder $quer){
            $quer->where('account_id',auth()->user()->id);
       })->first();
       if($query){
           return true;
       }
       return false;
    }

    public function scopeIsPatient($query){
        $query = $query->whereHas('patient', function (Builder $quer){
            $quer->where('account_id',auth()->user()->id);
       })->first();
       if($query){
           return true;
       }
       return false;
    }
}
