<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSubscribe extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'program_id',
        'currency',
        'total_amount',
        'subscribe_date'

    ];


    public function program(): BelongsTo{

        return $this->belongsTo(Program::class,'program_id','id');
    }

    public function user(): BelongsTo{

        return $this->belongsTo(User::class,'user_id','id');
    }
}
