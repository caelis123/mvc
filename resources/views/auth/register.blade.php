<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TRK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">

        <div class="text-center mb-10">
            <a href="/"><h1 class="text-2xl font-bold tracking-[0.2em] uppercase text-slate-800">TRK Service</h1></a>
            <p class="text-xs text-gray-400 tracking-widest uppercase mt-1">Jasa Service Elektronik</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
            <h2 class="text-xl font-extrabold text-slate-800 mb-1">Buat Akun Baru</h2>
            <p class="text-gray-400 text-sm mb-8">Daftar untuk mulai menggunakan layanan kami</p>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 mb-6 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Password</label>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <button type="submit" class="w-full bg-black text-white py-4 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition shadow-md">
                    Daftar Sekarang
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Masuk di sini</a>
        </p>
        <p class="text-center text-xs text-gray-400 mt-3">
            <a href="/" class="hover:text-black">← Kembali ke Beranda</a>
        </p>
    </div>
</body>
</html>