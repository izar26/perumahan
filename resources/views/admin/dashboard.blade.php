<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Salam Pembuka --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-500">Berikut adalah ringkasan konten website Anda.</p>
                </div>
            </div>

            {{-- Grid untuk Kartu Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-gray-500 uppercase text-sm font-bold">Total Tipe Unit</h4>
                        <p class="text-3xl font-extrabold mt-2">{{ $totalTipeUnit }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-gray-500 uppercase text-sm font-bold">Total Fasilitas</h4>
                        <p class="text-3xl font-extrabold mt-2">{{ $totalFasilitas }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-gray-500 uppercase text-sm font-bold">Total Agen</h4>
                        <p class="text-3xl font-extrabold mt-2">{{ $totalAgen }}</p>
                    </div>
                </div>

                <a href="{{ route('admin.pesan.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-gray-500 uppercase text-sm font-bold">Pesan Masuk</h4>
                                <p class="text-3xl font-extrabold mt-2">{{ $totalPesan }}</p>
                            </div>
                            @if($pesanBelumDibaca > 0)
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $pesanBelumDibaca }}</span>
                            @endif
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>