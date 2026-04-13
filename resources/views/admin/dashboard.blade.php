<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KKK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen">

    {{-- NAVBAR --}}
    <header class="bg-black text-white py-4 px-8 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <h1 class="text-lg font-bold tracking-[0.2em] uppercase">KKK Service</h1>
            <span class="bg-white text-black text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Admin</span>
        </div>
        <div class="flex items-center gap-6">
            <span class="text-sm text-gray-300">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white transition">Logout</button>
            </form>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 py-10">

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl px-6 py-4 mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- STATISTIK --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-white rounded-2xl border border-gray-100 p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-slate-800">{{ $total }}</p>
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-1">Total</p>
            </div>
            <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-blue-700">{{ $masuk }}</p>
                <p class="text-xs font-bold uppercase tracking-widest text-blue-400 mt-1">Masuk</p>
            </div>
            <div class="bg-yellow-50 rounded-2xl border border-yellow-100 p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-yellow-700">{{ $proses }}</p>
                <p class="text-xs font-bold uppercase tracking-widest text-yellow-400 mt-1">Proses</p>
            </div>
            <div class="bg-green-50 rounded-2xl border border-green-100 p-6 text-center shadow-sm">
                <p class="text-3xl font-extrabold text-green-700">{{ $selesai }}</p>
                <p class="text-xs font-bold uppercase tracking-widest text-green-400 mt-1">Selesai</p>
            </div>
        </div>

        {{-- FILTER & SEARCH --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6 shadow-sm">
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-wrap gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / no. resi..."
                    class="flex-1 min-w-[200px] border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-black">
                <select name="status" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-black bg-white">
                    <option value="">Semua Status</option>
                    <option value="masuk"   {{ request('status') == 'masuk'   ? 'selected' : '' }}>Masuk</option>
                    <option value="proses"  {{ request('status') == 'proses'  ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit" class="bg-black text-white px-6 py-2.5 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition">Filter</button>
                <a href="{{ route('admin.dashboard') }}" class="border border-gray-200 text-gray-500 px-6 py-2.5 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-gray-50 transition">Reset</a>
            </form>
        </div>

        {{-- TABEL SERVICE --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-sm font-bold uppercase tracking-widest text-gray-500">Daftar Service</h2>
            </div>

            @if ($services->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-zinc-50 border-b border-gray-100">
                            <tr>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">No. Resi</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Pelanggan</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Perangkat</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Keluhan</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Status</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Tanggal</th>
                                <th class="text-left px-6 py-3 text-xs font-bold uppercase tracking-widest text-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($services as $service)
                                <tr class="hover:bg-zinc-50 transition">
                                    <td class="px-6 py-4 font-mono text-xs font-bold text-slate-700">{{ $service->no_resi }}</td>
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-slate-800">{{ $service->nama_pelanggan }}</p>
                                        <p class="text-xs text-gray-400">{{ $service->no_hp }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-slate-700">{{ $service->jenis_perangkat }}</td>
                                    <td class="px-6 py-4 text-gray-500 max-w-[200px]">
                                        <p class="truncate">{{ $service->keluhan }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $badge = match($service->status) {
                                                'masuk'   => 'bg-blue-100 text-blue-800',
                                                'proses'  => 'bg-yellow-100 text-yellow-800',
                                                'selesai' => 'bg-green-100 text-green-800',
                                            };
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $badge }}">{{ $service->status }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400">{{ $service->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            {{-- Ubah status --}}
                                            <form method="POST" action="{{ route('admin.service.status', $service) }}">
                                                @csrf
                                                @method('POST')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="border border-gray-200 rounded-lg px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-black bg-white cursor-pointer">
                                                    <option value="masuk"   {{ $service->status == 'masuk'   ? 'selected' : '' }}>Masuk</option>
                                                    <option value="proses"  {{ $service->status == 'proses'  ? 'selected' : '' }}>Proses</option>
                                                    <option value="selesai" {{ $service->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </form>
                                            {{-- Hapus --}}
                                            <form method="POST" action="{{ route('admin.service.destroy', $service) }}"
                                                onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600 transition text-xs font-bold uppercase">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $services->withQueryString()->links() }}
                </div>
            @else
                <div class="py-16 text-center text-gray-400">
                    <p class="text-4xl mb-3">📭</p>
                    <p class="font-semibold">Belum ada data service</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>