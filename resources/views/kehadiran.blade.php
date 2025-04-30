<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container py-4">

        <!-- Back Button -->
        <div class="mb-3">
            <a href="{{ route('home') }}" class="btn btn-light">
                <i class="bi bi-arrow-left"></i> 
            </a>
        </div>

        <!-- Title -->
        <h5 class="mb-4 fw-bold">Kehadiran</h5>

        <div class="row g-4">
            <!-- Form Check-In/Out -->
            <div class="col-12 col-md-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h6 class="mb-3 fw-semibold">Check-In/Out</h6>

                    <!-- Map -->
                    <div class="rounded-4 overflow-hidden mb-4" style="height: 250px;">
                        <iframe 
                            src="https://maps.google.com/maps?q=Monas, Jakarta&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="">
                        </iframe>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('absen') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="keterangan" class="form-control rounded-pill w-full" placeholder="Tambah Keterangan">
                        </div>

                        @php
                            $statusSekarang = optional($riwayat->first())->checkOutTime;
                            $isCheckin = ($statusSekarang == '');
                            $buttonClass = $isCheckin ? 'bg-red-500' : 'bg-green-500';
                            $buttonText = $isCheckin ? 'Checkout' : 'Checkin';
                        @endphp

                        <div class="w-full px-4">
                           <button type="submit" class="cursor-pointer flex w-full mt-3 justify-center rounded-full {{ $buttonClass }} border-slate-950 border px-3 py-1.5 text-sm/6 font-semibold text-black shadow-xs hover:{{ $buttonClass }} focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                {{ $buttonText }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Riwayat Check-In/Out -->
            <div class="mt-6 p-4 bg-white shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Riwayat Check-In/Out</h2>

                <div class="space-y-3">
                    @foreach ($riwayat as $absen)
                        <div class="flex items-center justify-between p-3 bg-gray-100 rounded-md">
                            <div>
                                <div class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($absen->created_at)->format('Y-m-d h:i A') }}</div>
                            </div>
                            <div>
                                <!--@if ($absen->status == 'checkin')
                                    <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Checkin</span>
                                @elseif ($absen->status == 'checkout')
                                    <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Checkout</span>
                                @else-->
                                    <span class="px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">{{ ucfirst($absen->status) }}</span>
                                <!--@endif-->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>