<?php

// app/Http/Controllers/AbsensiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kehadiran; // model kehadiran kamu
use App\Services\AttendanceServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AttendancesController extends Controller
{
    public function index()
    {
        $riwayat = Kehadiran::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('kehadiran', compact('riwayat'));
    }

    public function absen(Request $request)
    {
        $userId = auth()->id(); // ID user login

        AttendanceServices::insert($userId);

        //$message = $this->absensiService->insert($userId);

        Session::flash('success', 'Check-in Berhasil!');

        return redirect()->back();
    }
}
