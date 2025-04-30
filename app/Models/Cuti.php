<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'leave__requests';

    protected $fillable = [
        'user_id',
        'startDate',
        'endDate',
        'reason',
        'status',
        'lampiran',
    ];
}
