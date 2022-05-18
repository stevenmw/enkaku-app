<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=[
        'account_id',
        'name',
        'address',
        'date_birth',
        'specialist',
        'start_hour',
        'end_hour',
    ];

    public function account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
}
