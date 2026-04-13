<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KKK Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">

        <div class="text-center mb-10">
            <a href="/"><h1 class="text-2xl font-bold tracking-[0.2em] uppercase text-slate-800">KKK Service</h1></a>
            <p class="text-xs text-gray-400 tracking-widest uppercase mt-1">Jasa Service Elektronik</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
            <h2 class="text-xl font-extrabold text-slate-800 mb-1">Selamat Datang</h2>
            <p class="text-gray-400 text-sm mb-8">Masuk ke akun Anda untuk melanjutkan</p>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 mb-6 text-sm">
                    @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 mb-6 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Password</label>
                    <input type="password" name="password" required placeholder="Masukkan password"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-black transition">
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300">
                        <span class="text-xs text-gray-500">Ingat saya</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-black text-white py-4 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-zinc-800 transition shadow-md">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            Belum punya akun? <a href="{{ route('register') }}" class="text-black font-semibold hover:underline">Daftar sekarang</a>
        </p>
        <p class="text-center text-xs text-gray-400 mt-3">
            <a href="/" class="hover:text-black">← Kembali ke Beranda</a>
        </p>
    </div>
</body>
</html>