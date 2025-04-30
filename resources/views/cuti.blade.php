<x-app-layout>
     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />
     
    <div class="p-4">
        <a href="{{ route('home') }}" class="text-gray-500 text-sm mb-4 inline-block">← Kembali</a>

        <h1 class="text-xl font-semibold mb-4">Cuti</h1>

         @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('cuti.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-lg shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Lampiran</label>
                <input type="file" name="lampiran" class="w-full mt-2 border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Mulai</label>
                <input type="date" name="startDate" class="w-full mt-2 border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Akhir</label>
                <input type="date" name="endDate" class="w-full mt-2 border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Alasan</label>
                <textarea name="reason" class="w-full mt-2 border rounded p-2" rows="3" placeholder="Isi Alasan" required></textarea>
            </div>

            <button type="submit" style="background-color: #333; color: white; padding: 10px 30px; border: none; border-radius: 50px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-size: 14px; font-weight: 500; cursor: pointer; width: 100%;">
                Submit
            </button>
        </form>

        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2">Riwayat Cuti</h2>

            @foreach ($riwayat_cuti as $index => $cuti)
                <div class="fade-in d-flex justify-content-between align-items-center p-3 mb-2 rounded" 
                style="animation-delay: {{ $index * 0.1 }}s; background-color: {{ $cuti->status == 'disetujui' ? '#ffffff' : '#f8d7da' }};
                        color: {{ $cuti->status == 'disetujui' ? '#000000' : '#721c24' }}; border: 1px solid {{ $cuti->status == 'disetujui' ? '#ccc' : '#f5c6cb' }};">
                <div>
                    {{ \Carbon\Carbon::parse($cuti->startDate)->format('Y-m-d') }} / 
                    {{ \Carbon\Carbon::parse($cuti->endDate)->format('Y-m-d') }}
                </div>
                <div class="fw-bold text-end" style="text-transform: capitalize;">{{ $cuti->status }}</div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>