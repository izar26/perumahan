<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ setting('company_name', 'Nama Perumahan') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-800">
    <div class="min-h-screen">
        <header class="bg-white shadow-md sticky top-0 z-50">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    @if(setting('company_logo'))
                        <img src="{{ Storage::url(setting('company_logo')) }}" alt="{{ setting('company_name') }}" class="h-10 w-auto">
                    @else
                        <span class="text-xl font-bold text-gray-800">{{ setting('company_name', 'Nama Perumahan') }}</span>
                    @endif
                </a>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#tipe-unit" class="text-gray-600 hover:text-gray-900">Tipe Unit</a>
                    <a href="#fasilitas" class="text-gray-600 hover:text-gray-900">Fasilitas</a>
                    <a href="#lokasi" class="text-gray-600 hover:text-gray-900">Lokasi</a>
                    <a href="#kontak" class="text-gray-600 hover:text-gray-900">Kontak</a>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/admin') }}" class="font-semibold text-gray-600 hover:text-gray-900">Admin Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                    @endauth
                </div>
            </nav>
        </header>

        <main>
            {{ $slot }}
        </main>
        
        <footer class="bg-gray-800 text-white">
            <div class="container mx-auto px-6 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="font-bold text-lg mb-4">{{ setting('company_name', 'Nama Perumahan') }}</h3>
                        <p class="text-gray-400">{{ setting('company_address', 'Alamat perusahaan belum diatur.') }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-4">Hubungi Kami</h3>
                        <ul class="space-y-2 text-gray-400">
                            @if(setting('company_phone'))
                                <li>Telepon: {{ setting('company_phone') }}</li>
                            @endif
                            @if(setting('company_email'))
                                <li>Email: {{ setting('company_email') }}</li>
                            @endif
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            @if(setting('social_instagram'))
                                <a href="{{ setting('social_instagram') }}" target="_blank" class="hover:text-gray-300">Instagram</a>
                            @endif
                            @if(setting('social_tiktok'))
                                <a href="{{ setting('social_tiktok') }}" target="_blank" class="hover:text-gray-300">TikTok</a>
                            @endif
                            @if(setting('social_facebook'))
                                <a href="{{ setting('social_facebook') }}" target="_blank" class="hover:text-gray-300">Facebook</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-500">
                    <p>&copy; {{ date('Y') }} {{ setting('company_name', 'Nama Perumahan Anda') }}. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>