<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tipeUnit->nama_tipe }} - Nama Perumahan Anda</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen">
        <header class="bg-white shadow-md">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
                    Logo Perumahan
                </a>
                <div>
                    @auth
                        <a href="{{ url('/admin') }}" class="font-semibold text-gray-600 hover:text-gray-900">Admin Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="container mx-auto px-6 py-12">
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                    <div class="lg:col-span-3">
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $tipeUnit->nama_tipe }}</h1>
                        <p class="text-gray-600 mb-6">{{ $tipeUnit->deskripsi_singkat }}</p>
                        <img src="{{ Storage::url($tipeUnit->thumbnail_path) }}" alt="{{ $tipeUnit->nama_tipe }}" class="w-full h-auto object-cover rounded-lg shadow-md mb-6">
                        
                        <h2 class="text-2xl font-bold mt-8 mb-4">Deskripsi Lengkap</h2>
                        <div class="prose max-w-none text-gray-700">
                           {!! nl2br(e($tipeUnit->deskripsi_lengkap)) !!}
                        </div>

                        @if(!$tipeUnit->photos->isEmpty())
<h2 class="text-2xl font-bold mt-8 mb-4">Galeri Foto</h2>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($tipeUnit->photos as $photo)
        <div>
            {{-- TAMBAHKAN data-fancybox="gallery" DI SINI --}}
            <a href="{{ Storage::url($photo->path) }}" data-fancybox="gallery" data-caption="{{ $tipeUnit->nama_tipe }} - Foto {{ $loop->iteration }}">
    <img src="{{ Storage::url($photo->path) }}" alt="Galeri {{ $tipeUnit->nama_tipe }}" class="w-full h-40 object-cover rounded-lg shadow-md hover:opacity-80 transition-opacity">
</a>
        </div>
    @endforeach
</div>
@endif

                    </div>

                    <div class="lg:col-span-2">
                        <div class="sticky top-10 border rounded-lg p-6">
                            <p class="text-gray-500 text-sm">Harga Mulai</p>
                            <p class="text-4xl font-extrabold text-gray-900 mb-6">Rp{{ number_format($tipeUnit->harga, 0, ',', '.') }}</p>

                            <h3 class="text-xl font-bold mb-4 border-t pt-6">Spesifikasi</h3>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex justify-between"><span>Luas Tanah</span> <span class="font-semibold">{{ $tipeUnit->luas_tanah }} m²</span></li>
                                <li class="flex justify-between"><span>Luas Bangunan</span> <span class="font-semibold">{{ $tipeUnit->luas_bangunan }} m²</span></li>
                            </ul>

                            @if($tipeUnit->denah_path)
                            <h3 class="text-xl font-bold mb-4 border-t pt-6 mt-6">Denah Unit</h3>
                            <img src="{{ Storage::url($tipeUnit->denah_path) }}" alt="Denah {{ $tipeUnit->nama_tipe }}" class="w-full h-auto rounded-lg border">
                            @endif

                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan tipe unit {{ urlencode($tipeUnit->nama_tipe) }}." target="_blank" class="mt-8 block w-full text-center bg-green-500 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-600 transition-colors duration-300 text-lg">
                                Hubungi Marketing (WA)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="bg-gray-800 text-white py-6 mt-16">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Nama Perumahan Anda. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>