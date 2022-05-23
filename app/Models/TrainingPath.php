<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPath extends Model
{
    use HasFactory;
    // konstatnta jenis training path
    const arus = 'ARUS';
    const kecepatan = 'KECEPATAN';
    const trayektori = 'TRAYEKTORI';
    const arrayType = ['ARUS','KECEPATAN','TRAYEKTORI'];

    protected $table= 'training_paths';

    protected $fillable = [
        'patient_id',
        'file_name',
        'path_name',
        'path_size',
        'type',
    ];

    
}
