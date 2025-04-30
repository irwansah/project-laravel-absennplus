<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuti;
use App\Models\SlipGaji;
use App\Models\Lembur;
use App\Models\Kehadiran;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang login
        
        $role = $user->roles; // Ambil role user

        $menuItems = $this->getMenuItemsByRole($role);

        $data = [
            'name' => $user->name,
            'cuti_baru' => Cuti::where('user_id', $user->id)->where('status', 'Approved')->count(),
            'slip_gaji_baru' => SlipGaji::where('user_id', $user->id)->count(),
            'lembur_baru' => Lembur::where('user_id', $user->id)->where('status', 'Approved')->count(),
            'riwayat_kehadiran_baru' => Kehadiran::where('user_id', $user->id)->count(),
            'kehadiran_sekarang' => Kehadiran::where('user_id', auth()->id())->whereNull('checkOutTime')->first(),
        ];

        return view('Home', compact('data', 'menuItems', 'role'));
    }

    // Fungsi untuk menyesuaikan menu dengan role
    protected function getMenuItemsByRole($role)
    {
        switch ($role) {
            case 'admin':
                return [
                    [
                        'title' => 'Daftar User',
                        'route' => 'cuti',
                        'info_key' => 'jml_user',
                    ],
                    [
                        'title' => 'Laporan Admin',
                        'route' => 'cuti',
                        'info_key' => 'daftar',
                    ],
                    [
                        'title' => 'Riwayat Kehadiran',
                        'route' => 'cuti',
                        'info_key' => 'daftar',
                    ],
                    [
                        'title' => 'Riwayat Cuti',
                        'route' => 'cuti',
                        'info_key' => 'jml_riwcuti',
                    ],
                    [
                        'title' => 'Riwayat Lembur',
                        'route' => 'cuti',
                        'info_key' => 'jml_riwlembur',
                    ]
                ];
            case 'Karyawan':
                return[
                    [
                    'title' => 'Cuti',
                    'route' => 'cuti',
                    'info_key' => 'jml_Cuti',
                    ],
                    [
                        'title' => 'Slip Gaji',
                        'route' => 'cuti',
                        'info_key' => 'jml_slipgaji',
                    ],
                    [
                        'title' => 'Lembur',
                        'route' => 'cuti',
                        'info_key' => 'jml_lembur',
                    ],
                    [
                        'title' => 'Riwayat Kehadiran',
                        'route' => 'cuti',
                        'info_key' => 'daftar',
                    ],
                    [
                        'title' => 'Riwayat Cuti',
                        'route' => 'cuti',
                        'info_key' => 'jml_riwcuti',
                    ],
                    [
                        'title' => 'Riwayat Lembur',
                        'route' => 'cuti',
                        'info_key' => 'jml_riwlembur',
                    ]
                ];
            case 'hrd':
                return [
                    [
                        'title' => 'Daftar Permohonan',
                        'route' => 'cuti',
                        'info_key' => 'daftar',
                    ]
                ];
            default:
                return [
                    [
                        'title' => 'Daftar User',
                        'route' => 'cuti',
                        'info_key' => 'jml_user',
                    ]
                ];
        }
    }
}
