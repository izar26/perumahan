@if(setting('company_logo'))
    {{-- Jika logo perusahaan sudah di-upload di settings, tampilkan gambar logo --}}
    <img src="{{ Storage::url(setting('company_logo')) }}" alt="{{ setting('company_name') }}" {{ $attributes }}>
@else
    {{-- Jika tidak ada logo, tampilkan nama perusahaan sebagai teks --}}
    <span class="text-xl font-bold">
        {{ setting('company_name', 'Nama Perusahaan') }}
    </span>
@endif