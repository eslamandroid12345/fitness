<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function day(): BelongsTo{

        return $this->belongsTo(Day::class,'day_id','id');

    }


}
