<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRK Tech - Jasa Service Elektronik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .hero-bg {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                    url('https://muriabisnis.com/uploads/Jual20240727-033452-jual-alat-peralatan-elektrik-elektronik-murah-terdekat-pati.webp');
        background-size: cover;      
        background-position: center; 
        background-repeat: no-repeat;
        width: 100%;                
    }
</style>
</head>
<body class="bg-zinc-50 text-gray-800 min-h-screen">

    <header class="py-6 border-b border-gray-100">
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
                        <img src="{{ asset('logo-web-service.png') }}" alt="Logo" class="h-16 mx-auto mb-2">
                        <h1 class="text-xl font-bold tracking-[0.2em] uppercase text-slate-800">TRK Service</h1>
                    </a>
                </div>

                <nav class="flex justify-end space-x-6 w-1/3 text-xs font-bold uppercase tracking-widest text-gray-500">
                    <a href="/" class="text-black border-b-2 border-black pb-1">Home</a>
                    <a href="#" class="hover:text-black transition">Kontak</a>
                </nav>
            </div>

            <div class="mt-6 flex justify-center space-x-8 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                <a href="#" class="hover:text-black">Service TV</a>
                <a href="#" class="hover:text-black">Laptop</a>
                <a href="#" class="hover:text-black">Kulkas</a>
                <a href="#" class="hover:text-black">AC</a>
                <a href="#" class="hover:text-black">Mesin Cuci</a>
            </div>
        </div>
    </header>

    <section class="hero-bg min-h-[700px] flex flex-col items-center justify-center text-center text-white px-4 relative">

    <div class="max-w-6xl mx-auto flex flex-col items-center">
        
        <div class="mb-16">
            <h2 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight leading-[1.1]">
                Jasa Service Elektronik <br> Profesional
            </h2>
            <p class="text-xl md:text-2xl text-gray-200 font-medium">
                Perbaikan cepat, transparan, dan bergaransi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full pt-4">
            <div class="px-4">
                <h3 class="font-bold uppercase tracking-widest mb-3 text-lg">Teknisi Ahli</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Dikerjakan oleh tim berpengalaman di bidangnya.</p>
            </div>
            <div class="px-4">
                <h3 class="font-bold uppercase tracking-widest mb-3 text-lg">Suku Cadang Ori</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Sparepart dengan kualitas tinggi & original.</p>
            </div>
            <div class="px-4">
                <h3 class="font-bold uppercase tracking-widest mb-3 text-lg">Garansi Layanan</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Setiap perbaikan mendapatkan jaminan garansi.</p>
            </div>
        </div>
    </div>
</section>

    <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-xl font-bold uppercase tracking-[0.4em] mb-20 text-slate-800">
            Alur Layanan
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="flex flex-col items-center">
                <div class="bg-black text-white p-8 rounded-[2rem] text-center shadow-xl hover:scale-105 transition duration-300 min-h-[220px] flex flex-col justify-center border border-zinc-800">
                    <span class="block text-sm font-extrabold uppercase tracking-[0.2em] mb-4 text-white">
                        01. Registrasi
                    </span>
                    <p class="text-[11px] leading-relaxed text-gray-300">
                        Buat akun untuk mendata perangkat elektronik Anda dengan aman.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-black text-white p-8 rounded-[2rem] text-center shadow-xl hover:scale-105 transition duration-300 min-h-[220px] flex flex-col justify-center border border-zinc-800">
                    <span class="block text-sm font-extrabold uppercase tracking-[0.2em] mb-4 text-white">
                        02. Booking
                    </span>
                    <p class="text-[11px] leading-relaxed text-gray-300">
                        Pilih jenis kerusakan dan tentukan jadwal antar atau jemput barang.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-black text-white p-8 rounded-[2rem] text-center shadow-xl hover:scale-105 transition duration-300 min-h-[220px] flex flex-col justify-center border border-zinc-800">
                    <span class="block text-sm font-extrabold uppercase tracking-[0.2em] mb-4 text-white">
                        03. Perbaikan
                    </span>
                    <p class="text-[11px] leading-relaxed text-gray-300">
                        Teknisi ahli kami mengerjakan perangkat Anda. Pantau progres di dashboard.
                    </p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <div class="bg-black text-white p-8 rounded-[2rem] text-center shadow-xl hover:scale-105 transition duration-300 min-h-[220px] flex flex-col justify-center border border-zinc-800">
                    <span class="block text-sm font-extrabold uppercase tracking-[0.2em] mb-4 text-white">
                        04. Selesai
                    </span>
                    <p class="text-[11px] leading-relaxed text-gray-300">
                        Barang kembali berfungsi normal dengan jaminan garansi dari kami.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

</body>
</html>