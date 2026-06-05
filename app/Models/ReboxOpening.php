<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReboxOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rebox_id',
        'rebox_code',
        'rebox_name',
        'opened_by',
        'status',
    ];
}
