<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Service - TRK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen">

    {{-- HEADER --}}
    <header class="py-6 border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="w-1/3 flex justify-start pl-4">
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('login') }}" class="bg-black px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest text-white hover:bg-zinc-800 transition duration-300 shadow-md text-center">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-black px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest text-white hover:bg-zinc-800 transition duration-300 shadow-md text-center">
                            Register
                        </a>
                    </div>
                </div>

                <div class="text-center w-1/3">
                    <a href="/" class="inline-block">
                        <h1 class="text-xl font-bold tracking-[0.2em] uppercase text-slate-800">TRK Service</h1>
                    </a>
                </div>

                <nav class="flex justify-end space-x-6 w-1/3 text-xs font-bold uppercase tracking-widest text-gray-500">
                    <a href="/" class="hover:text-black transition">Home</a>
                    <a href="{{ route('service.tracking') }}" class="hover:text-black transition">Cek Resi</a>
                </nav>
            </div>
        </div>
    </header>

    {{-- FORM PENDAFTARAN --}}
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-800 mb-2">Daftar Service</h2>
                <p class="text-gray-500 text-sm">Isi formulir di bawah untuk mendaftarkan perangkat Anda</p>
            </div>

            {{-- Pesan error validasi --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl px-6 py-4 mb-6 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <form action="{{ route('service.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Nama Pelanggan --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">
                            Nama Pelanggan
                        </label>
                        <input
                            type="text"
                            name="nama_pelanggan"
                            value="{{ old('nama_pelanggan') }}"
                            placeholder="Masukkan nama lengkap"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition"
                        >
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">
                            No. HP / WhatsApp
                        </label>
                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            placeholder="Contoh: 08123456789"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition"
                        >
                    </div>

                    {{-- Jenis Perangkat --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">
                            Jenis Perangkat
                        </label>
                        <select
                            name="jenis_perangkat"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition bg-white"
                        >
                            <option value="" disabled {{ old('jenis_perangkat') ? '' : 'selected' }}>-- Pilih Perangkat --</option>
                            @foreach(['TV', 'Laptop', 'Kulkas', 'AC', 'Mesin Cuci', 'HP / Smartphone', 'Lainnya'] as $item)
                                <option value="{{ $item }}" {{ old('jenis_perangkat') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Keluhan --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">
                            Keluhan / Kerusakan
                        </label>
                        <textarea
                            name="keluhan"
                            rows="4"
                            placeholder="Ceritakan kerusakan perangkat Anda secara detail..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition resize-none"
                        >{{ old('keluhan') }}</textarea>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full bg-black text-white py-4 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition duration-300 shadow-md"
                    >
                        Daftarkan Sekarang
                    </button>

                </form>
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">
                Sudah punya nomor resi?
                <a href="{{ route('service.tracking') }}" class="text-black font-semibold hover:underline">Cek status di sini</a>
            </p>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-gray-100 py-8 text-center text-xs text-gray-400 uppercase tracking-widest">
        &copy; {{ date('Y') }} TRK Service. All rights reserved.
    </footer>

</body>
</html>