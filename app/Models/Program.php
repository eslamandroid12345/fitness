<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image'
    ];


    public function weeks(): HasMany{

        return $this->hasMany(Week::class,'program_id','id');
    }


    public function days(): HasManyThrough{

        return $this->hasManyThrough(Day::class,Week::class,'program_id','week_id','id','id');
    }
}
