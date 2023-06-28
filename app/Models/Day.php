<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Day extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exercises(): HasMany{

        return $this->hasMany(Exercise::class,'day_id','id');
    }


}
