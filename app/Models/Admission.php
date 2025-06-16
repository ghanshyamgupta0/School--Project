<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'dob',
        'gender',
        'address',
        'previous_school',
        'grade_applying',
        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_occupation',
    ];
} 