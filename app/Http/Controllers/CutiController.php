<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use Illuminate\Support\Facades\Session;

class CutiController extends Controller
{
    public function index()
    {
        $riwayat_cuti = Cuti::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cuti', compact('riwayat_cuti'));
    }

    public function submit(Request $request)
    {
        // Validasi form
        $request->validate([
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'reason' => 'required|string|max:255',
        ]);

        $cuti = new Cuti();
        $cuti->user_id = auth()->id();
        $cuti->startDate = $request->startDate;
        $cuti->endDate = $request->endDate;
        $cuti->reason = $request->reason;

        $lampiran = null;
        if ($request->hasFile('lampiran')) {
            $cuti->lampiran = $request->file('lampiran')->store('lampiran', 'public');
        }

        $cuti->status = 'pending'; // default
        $cuti->save();

        Session::flash('success', 'Pengajuan cuti berhasil dikirim!');

        return redirect()->back();
    }
}