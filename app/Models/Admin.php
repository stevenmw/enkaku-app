<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'account_id',
        'name',
        'gender',
        'start_hour',
        'end_hour'
    ];

    public function account(){
        return $this->belongsTo(User::class,'account_id','id');
    }
}
