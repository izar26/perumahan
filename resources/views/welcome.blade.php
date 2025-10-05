<x-layouts.guest>

    <section class="relative h-[60vh] md:h-[80vh] flex items-center justify-center text-center text-white bg-gray-800">
        {{-- Ganti 'images/hero-bg.jpg' dengan gambar hero perumahanmu di folder public/images --}}
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 tracking-tight">
                Hunian Eksklusif di Lokasi Strategis
            </h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
                Wujudkan impian keluarga Anda untuk memiliki rumah modern dengan fasilitas lengkap dan lingkungan yang nyaman.
            </p>
            <a href="#tipe-unit" class="mt-8 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg transition-transform transform hover:scale-105">
                Lihat Tipe Unit
            </a>
        </div>
    </section>

    <section id="tipe-unit" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Tipe Unit Pilihan Kami</h2>
                <p class="text-gray-600 mt-2">Didesain untuk memenuhi setiap kebutuhan gaya hidup Anda.</p>
            </div>
            
            @if($tipeUnits->isEmpty())
                <p class="text-center text-gray-500">Saat ini belum ada tipe unit yang tersedia.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($tipeUnits as $unit)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden group">
                        <div class="overflow-hidden">
                            <img src="{{ Storage::url($unit->thumbnail_path) }}" alt="{{ $unit->nama_tipe }}" class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">{{ $unit->nama_tipe }}</h3>
                            <p class="text-gray-600 mb-4 h-20">{{ $unit->deskripsi_singkat }}</p>
                            
                            <div class="flex justify-between items-center text-sm text-gray-500 mb-4 border-t pt-4">
                                <span><strong class="text-gray-800">LT:</strong> {{ $unit->luas_tanah }} m²</span>
                                <span><strong class="text-gray-800">LB:</strong> {{ $unit->luas_bangunan }} m²</span>
                            </div>

                            <div>
                                <p class="text-gray-500 text-sm">Mulai dari</p>
                                <p class="text-2xl font-extrabold text-indigo-600">Rp{{ number_format($unit->harga, 0, ',', '.') }}</p>
                            </div>
                            
                            <a href="{{ route('tipe-unit.show', $unit) }}" class="mt-6 block w-full text-center bg-gray-800 text-white font-bold py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section id="fasilitas" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Fasilitas Unggulan</h2>
                <p class="text-gray-600 mt-2">Menunjang kenyamanan dan kualitas hidup Anda setiap hari.</p>
            </div>
            
            @if(!$fasilitas->isEmpty())
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 text-center">
                    @foreach ($fasilitas as $item)
                    <div class="flex flex-col items-center p-4 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="bg-white p-4 rounded-full shadow-md mb-4 border border-gray-200">
                            <img src="{{ Storage::url($item->icon_path) }}" alt="{{ $item->nama_fasilitas }}" class="w-12 h-12">
                        </div>
                        <h4 class="font-semibold">{{ $item->nama_fasilitas }}</h4>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Hubungi Tim Marketing Kami</h2>
                <p class="text-gray-600 mt-2">Kami siap membantu Anda menemukan hunian yang tepat.</p>
            </div>
            
            @if(!$agens->isEmpty())
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach ($agens as $agen)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 text-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="{{ Storage::url($agen->foto_path) }}" alt="{{ $agen->nama_agen }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white ring-2 ring-indigo-500">
                            <h3 class="text-xl font-bold">{{ $agen->nama_agen }}</h3>
                            <p class="text-gray-500 mb-4">{{ $agen->jabatan }}</p>
                            <a href="https://wa.me/{{ $agen->nomor_wa }}?text=Halo, saya tertarik dengan salah satu unit perumahan Anda." target="_blank" class="inline-block bg-green-500 text-white font-bold py-2 px-6 rounded-full hover:bg-green-600 transition-colors duration-300">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section id="lokasi" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Lokasi & Kontak</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div id="kontak" class="bg-white rounded-lg shadow-lg overflow-hidden h-full">
                    @if(setting('maps_embed'))
                        <div class="w-full h-full min-h-[400px]">
                            {!! setting('maps_embed') !!}
                        </div>
                    @else
                        <div class="w-full h-96 flex items-center justify-center bg-gray-200">
                            <p class="text-gray-500">Peta lokasi belum diatur.</p>
                        </div>
                    @endif
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Ada Pertanyaan?</h3>
                    <p class="text-gray-600 mb-6">Jangan ragu untuk menghubungi kami melalui form di bawah ini. Tim kami akan segera merespon Anda.</p>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="sr-only">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" required placeholder="Nama Lengkap Anda" class="w-full px-4 py-3 bg-gray-100 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="kontak" class="sr-only">Email / No. HP</label>
                            <input type="text" name="kontak" id="kontak" required placeholder="Email / No. HP" class="w-full px-4 py-3 bg-gray-100 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="subjek" class="sr-only">Subjek</label>
                            <input type="text" name="subjek" id="subjek" required placeholder="Subjek Pesan" class="w-full px-4 py-3 bg-gray-100 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="isi_pesan" class="sr-only">Isi Pesan</label>
                            <textarea name="isi_pesan" id="isi_pesan" rows="4" required placeholder="Tuliskan pesan Anda di sini..." class="w-full px-4 py-3 bg-gray-100 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="inline-flex justify-center py-3 px-8 border border-transparent shadow-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.guest>