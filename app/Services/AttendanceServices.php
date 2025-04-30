<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class AttendanceServices
{
    public static function insert($userId)
    {
        DB::statement('EXEC sp__InsertAntendances @user_id = ?', [$userId,]);
    }
}