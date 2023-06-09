<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [

        'location_ar',
        'location_en',
        'phone',
        'email',
        'privacy_ar',
        'privacy_en'

    ];
}


