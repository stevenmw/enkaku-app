<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable=[
        'account_id',
        'date_birth',
        'weight',
        'height',
        'disease_and_condition',
        'contact_number',
    ];

    public function account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }

    public function doctors(){
        return $this->belongsToMany(Doctor::class,'patient_doctors','doctor_id','id');
    }
}
