<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Service - TRK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen">

    {{-- NAVBAR --}}
    <header class="py-6 border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="w-1/3"></div>
                <div class="text-center w-1/3">
                    <a href="/"><h1 class="text-xl font-bold tracking-[0.2em] uppercase text-slate-800">TRK Service</h1></a>
                </div>
                <div class="flex justify-end items-center gap-4 w-1/3">
                    <span class="text-sm text-gray-500">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-black text-white px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-800">Riwayat Service</h2>
                    <p class="text-gray-400 text-sm mt-1">Semua permintaan service yang pernah Anda daftarkan</p>
                </div>
                <a href="{{ route('service.create') }}"
                    class="bg-black text-white px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition shadow-md">
                    + Daftar Service
                </a>
            </div>

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl px-6 py-4 mb-6 text-sm">
                    <p class="font-bold mb-1">{{ session('success') }}</p>
                    @if (session('resi'))
                        <p>Nomor Resi: <span class="font-mono font-extrabold text-green-900">{{ session('resi') }}</span></p>
                    @endif
                </div>
            @endif

            {{-- List riwayat --}}
            @if ($services->count() > 0)
                <div class="space-y-4">
                    @foreach ($services as $service)
                        @php
                            $badge = match($service->status) {
                                'masuk'   => 'bg-blue-100 text-blue-800',
                                'proses'  => 'bg-yellow-100 text-yellow-800',
                                'selesai' => 'bg-green-100 text-green-800',
                                default   => 'bg-gray-100 text-gray-800',
                            };
                            $label = match($service->status) {
                                'masuk'   => '📥 Masuk',
                                'proses'  => '🔧 Sedang Diproses',
                                'selesai' => '✅ Selesai',
                                default   => $service->status,
                            };
                        @endphp
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <p class="font-mono text-xs font-bold text-gray-400 mb-1">{{ $service->no_resi }}</p>
                                    <p class="font-bold text-slate-800 text-lg">{{ $service->jenis_perangkat }}</p>
                                </div>
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase {{ $badge }}">{{ $label }}</span>
                            </div>

                            <p class="text-sm text-gray-500 mb-4 leading-relaxed">{{ $service->keluhan }}</p>

                            {{-- Progress --}}
                            <div class="flex items-center gap-2 mb-4">
                                @foreach(['masuk' => '1. Masuk', 'proses' => '2. Proses', 'selesai' => '3. Selesai'] as $key => $step)
                                    @php
                                        $statuses = ['masuk', 'proses', 'selesai'];
                                        $currentIndex = array_search($service->status, $statuses);
                                        $stepIndex = array_search($key, $statuses);
                                        $isActive = $stepIndex <= $currentIndex;
                                    @endphp
                                    <div class="flex-1 text-center">
                                        <div class="h-1.5 rounded-full {{ $isActive ? 'bg-black' : 'bg-gray-200' }} mb-1"></div>
                                        <span class="text-[10px] font-bold uppercase {{ $isActive ? 'text-black' : 'text-gray-300' }}">{{ $step }}</span>
                                    </div>
                                    @if (!$loop->last)<div class="w-3 text-gray-200 text-xs mb-3">›</div>@endif
                                @endforeach
                            </div>

                            <div class="flex justify-between items-center text-xs text-gray-400 border-t border-gray-50 pt-3">
                                <span>No. HP: {{ $service->no_hp }}</span>
                                <span>{{ $service->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-16 text-center">
                    <p class="text-5xl mb-4">🛠️</p>
                    <p class="font-bold text-slate-800 mb-2">Belum ada riwayat service</p>
                    <p class="text-gray-400 text-sm mb-6">Daftarkan perangkat Anda untuk mulai.</p>
                    <a href="{{ route('service.create') }}"
                        class="inline-block bg-black text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition">
                        Daftar Service Sekarang
                    </a>
                </div>
            @endif
        </div>
    </section>

    <footer class="border-t border-gray-100 py-8 text-center text-xs text-gray-400 uppercase tracking-widest mt-8">
        &copy; {{ date('Y') }} TRK Service. All rights reserved.
    </footer>
</body>
</html>