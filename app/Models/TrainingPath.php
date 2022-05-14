<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPath extends Model
{
    use HasFactory;
    protected $table= 'training_paths';

    protected $fillable = [
        'patient_id',
        'path_name',
        'path_size',
    ];
}
