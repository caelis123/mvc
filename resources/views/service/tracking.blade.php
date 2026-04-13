<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Resi - KKK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen">

    <header class="py-6 border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="w-1/3">
                    <div class="flex flex-col space-y-3 w-fit">
                        <a href="{{ route('login') }}" class="bg-black px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest text-white hover:bg-zinc-800 transition text-center">Login</a>
                        <a href="{{ route('register') }}" class="bg-black px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest text-white hover:bg-zinc-800 transition text-center">Register</a>
                    </div>
                </div>
                <div class="text-center w-1/3">
                    <a href="/"><h1 class="text-xl font-bold tracking-[0.2em] uppercase text-slate-800">KKK Service</h1></a>
                </div>
                <nav class="flex justify-end space-x-6 w-1/3 text-xs font-bold uppercase tracking-widest text-gray-500">
                    <a href="/" class="hover:text-black">Home</a>
                    <a href="{{ route('service.create') }}" class="hover:text-black">Daftar Service</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-800 mb-2">Cek Status Resi</h2>
                <p class="text-gray-500 text-sm">Masukkan nomor resi untuk melihat status perbaikan Anda</p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl px-6 py-4 mb-6 text-sm text-center">
                    <p class="font-bold mb-1">{{ session('success') }}</p>
                    @if (session('resi'))
                        <p>Nomor Resi: <span class="font-mono font-extrabold text-green-900 text-base">{{ session('resi') }}</span></p>
                        <p class="mt-1 text-xs text-green-600">Simpan nomor ini untuk memantau status servis Anda.</p>
                    @endif
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-8">
                <form action="{{ route('service.tracking') }}" method="GET" class="flex gap-3">
                    <input type="text" name="resi" value="{{ request('resi') }}" placeholder="Contoh: SVC-ABC123..." class="flex-1 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black font-mono">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition">Cek</button>
                </form>
            </div>

            @if ($searched)
                @if ($service)
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-sm font-bold uppercase tracking-widest text-gray-500">Detail Service</h3>
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
                            <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase {{ $badge }}">{{ $label }}</span>
                        </div>
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between border-b border-gray-50 pb-3">
                                <span class="text-gray-400 font-semibold uppercase text-xs">No. Resi</span>
                                <span class="font-mono font-bold text-slate-800">{{ $service->no_resi }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-3">
                                <span class="text-gray-400 font-semibold uppercase text-xs">Nama</span>
                                <span class="font-semibold text-slate-800">{{ $service->nama_pelanggan }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-3">
                                <span class="text-gray-400 font-semibold uppercase text-xs">No. HP</span>
                                <span class="text-slate-800">{{ $service->no_hp }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 pb-3">
                                <span class="text-gray-400 font-semibold uppercase text-xs">Perangkat</span>
                                <span class="text-slate-800">{{ $service->jenis_perangkat }}</span>
                            </div>
                            <div class="border-b border-gray-50 pb-3">
                                <span class="text-gray-400 font-semibold uppercase text-xs block mb-1">Keluhan</span>
                                <p class="text-slate-800 leading-relaxed">{{ $service->keluhan }}</p>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400 font-semibold uppercase text-xs">Terdaftar</span>
                                <span class="text-slate-800">{{ $service->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div class="mt-8">
                            <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">Progress</p>
                            <div class="flex items-center gap-2">
                                @foreach(['masuk' => '1. Masuk', 'proses' => '2. Proses', 'selesai' => '3. Selesai'] as $key => $step)
                                    @php
                                        $statuses = ['masuk', 'proses', 'selesai'];
                                        $currentIndex = array_search($service->status, $statuses);
                                        $stepIndex = array_search($key, $statuses);
                                        $isActive = $stepIndex <= $currentIndex;
                                    @endphp
                                    <div class="flex-1 text-center">
                                        <div class="h-2 rounded-full {{ $isActive ? 'bg-black' : 'bg-gray-200' }} mb-1.5"></div>
                                        <span class="text-[10px] font-bold uppercase {{ $isActive ? 'text-black' : 'text-gray-300' }}">{{ $step }}</span>
                                    </div>
                                    @if (!$loop->last)<div class="w-4 text-gray-200 text-xs mb-3">›</div>@endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center">
                        <div class="text-5xl mb-4">🔍</div>
                        <p class="font-bold text-slate-800 mb-1">Resi tidak ditemukan</p>
                        <p class="text-gray-400 text-sm">Pastikan nomor resi yang Anda masukkan sudah benar.</p>
                    </div>
                @endif
            @endif

            <p class="text-center text-xs text-gray-400 mt-8">
                Belum punya resi? <a href="{{ route('service.create') }}" class="text-black font-semibold hover:underline">Daftar service di sini</a>
            </p>
        </div>
    </section>

    <footer class="border-t border-gray-100 py-8 text-center text-xs text-gray-400 uppercase tracking-widest">
        &copy; {{ date('Y') }} KKK Service. All rights reserved.
    </footer>
</body>
</html>