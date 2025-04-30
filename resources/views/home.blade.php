<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- CDN develop onlu -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

        <style>
            .bottom-nav {
                display: flex;
                justify-content: space-around;
                align-items: center;
                background: white;
                padding: 10px 0;
                border-top: 1px solid #eee;
            }

            .bottom-nav a {
                text-align: center;
                text-decoration: none;
                color: #bbb; /* default abu-abu */
                font-size: 12px;
            }

            .bottom-nav a.active {
                color: #000; /* aktif jadi hitam */
            }

            .bottom-nav i {
                font-size: 18px;
                display: block;
                margin-bottom: 2px;
            }
        </style>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div
            id="splash-screen"
            class="fixed left-0 right-0 bottom-0 top-0 text-center bg-white flex items-center justify-center z-[999]"
        >
            <div
                class="transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 starting:translate-y-6 flex flex-col justify-center items-center justify-items-center"
            >
                <img src="{{ asset('/icons/logo.png') }}" alt="Logo" class="w-64"/>
                <p class="text-sm text-gray-500">
                    copyright ©️ absennplus {{ date("Y") }}
                </p>
            </div>
        </div>

        <div id="main">
            <div class="topbar top-0 bg-white relative md:sticky w-full md:shadow-lg z-[99]">
                <div class="container w-full flex justify-between items-center p-4 md:max-w-[60%] md:mx-auto">
                    <h1>Halo, {{ $data['name'] }}</h1>
                    <div class="profile flex justify-between gap-2 items-center" >
                        <div class="search">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-search-icon lucide-search"
                            >
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <div class="avatar">
                            <img
                                src="https://i.pravatar.cc/50"
                                class="w-10 h-10 rounded-full border-2"
                                alt="Profile"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div id="content"class="relative container-fluid md:max-w-[60%] md:mx-auto md:border border-[#ddd] min-h-[100dvh] p-4 md:-mt-1">
                <h1 class="text-5xl font-extrabold p-4">
                    Selamat datang Absenn+
                </h1>
                <div class="menu grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 p-4 ">
                    <div class="col-span-2 md:col-span-3 lg:col-span-4 card card-alert bg-[#aff4c6] shadow-lg w-full rounded-3xl flex justify-start gap-2 p-4 {{ $role == 'Karyawan' ? '' : 'hidden' }}">
                        <div class="icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <h1>{{ $data['kehadiran_sekarang'] ? 'Sedang Bekerja' : 'Tidak Bekerja' }}</h1>
                            <p>
                            @if (!empty($data['kehadiran_sekarang']) && $data['kehadiran_sekarang']->created_at)
                                @php
                                    $diff = now()->diff($data['kehadiran_sekarang']->created_at);
                                @endphp
                                {{ $diff->h }} jam {{ $diff->i }} menit berlalu
                            @else
                                -
                            @endif
                            </p>
                            <form id="absenForm" action="{{ route('absen') }}" method="POST">
                                @csrf
                                @if (empty($data['kehadiran_sekarang']))
                                    <button type="submit" class="cursor-pointer flex w-full mt-3 justify-center rounded-full bg-gray-100 border-slate-300 border px-3 py-1.5 text-sm/6 font-semibold text-black shadow-xs hover:bg-gray-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        Checkin
                                    </button>
                                @else
                                    <button type="submit" class="cursor-pointer flex w-full mt-3 justify-center rounded-full bg-gray-100 border-slate-300 border px-3 py-1.5 text-sm/6 font-semibold text-black shadow-xs hover:bg-gray-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        Checkout
                                    </button>
                                @endif                                
                            </form>
                        </div>
                    </div>
                    @foreach($menuItems as $item)
                        @php
                            $count = $data[$item['info_key']] ?? 0;
                            $text = $item['info_key'] === 'jml_Cuti' ? 'Remaining'
                                : (str_contains($item['info_key'], 'daftar') ? 'New'
                                : (str_contains($item['info_key'], 'slipgaji') ? 'Incoming' : 'Pass'));
                        @endphp
                    <div style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                        <a href="{{ route($item['route']) }}" class="card card-alert cursor-pointer  hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                            <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eyeoff-icon lucide-eyeoff">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                            </div>
                            <div class="body">
                                <span class="text-gray-400">{{ $count }} {{ $text }}</span>
                                <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>
                            </div>
                        </a>                        
                    </div> 
                    @endforeach 

                    <!--<div style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                        <a href="{{ route('cuti') }}" class="card card-alert cursor-pointer  hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                            <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                            </div>
                            <div class="body">
                                <span class="text-gray-400">{{ $data['cuti_baru'] }} Remaining</span>
                                <h3 class="text-lg font-bold">Cuti</h3>
                            </div>
                        </a>   
                    </div>              

                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['slip_gaji_baru'] }} Incoming</span>
                            <h3 class="text-lg font-bold">Slip Gaji</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['lembur_baru'] }} Pass</span>
                            <h3 class="text-lg font-bold">Lembur</h3>
                        </div>
                    </div>

                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Riwayat Kehadiran</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Daftar Permohonan</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Riwayat Cuti</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Laporan Admin</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Riwayat Lembur</h3>
                        </div>
                    </div>
                    <div class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4">
                        <div class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">{{ $data['riwayat_kehadiran_baru'] }} New</span>
                            <h3 class="text-lg font-bold">Daftar User</h3>
                        </div>
                    </div> -->
                </div>
            </div>

            <nav class="bottom-nav">
                <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </div>
                    <span>beranda</span>
                </a>

                <a href="{{ route('kehadiran') }}" class="{{ Request::is('kehadiran') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock4-icon lucide-clock-4">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                    <span>kehadiran</span>
                </a>

                <a href="#" class="{{ Request::is('pemberitahuan') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell">
                                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                                <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                        </svg>
                    </div>
                    <span>pemberitahuan</span>
                </a>
            </nav>
        </div>

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
        </script>
        @endif
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(() => {
                    const splash = document.getElementById("splash-screen");
                    const content = document.getElementById("main-content");
                    splash.classList.add("hidden");
                    content.classList.remove("opacity-0");
                }, 2000); // 2 detik
            });

            document.getElementById('absenForm').addEventListener('submit', function() {
                const button = document.getElementById('absenButton');
                button.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                button.classList.add('bg-green-500', 'hover:bg-green-600');
                button.innerText = 'Memproses...'; // Opsional: kasih text loading
                button.disabled = true; // Biar nggak bisa klik berkali-kali
            });
        </script>
    </body>
</html>
