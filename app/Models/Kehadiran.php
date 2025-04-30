<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'attendances';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'status',
        'remarks'
    ];
}
