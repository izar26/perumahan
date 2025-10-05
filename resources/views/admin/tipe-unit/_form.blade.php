{{-- resources/views/admin/tipe-unit/_form.blade.php --}}

@csrf
<div class="mt-4">
    <x-input-label for="nama_tipe" :value="__('Nama Tipe')" />
    <x-text-input id="nama_tipe" class="block mt-1 w-full" type="text" name="nama_tipe" :value="old('nama_tipe', $tipeUnit->nama_tipe ?? '')" required autofocus />
    <x-input-error :messages="$errors->get('nama_tipe')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="harga" :value="__('Harga')" />
    <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga', $tipeUnit->harga ?? '')" required />
    <x-input-error :messages="$errors->get('harga')" class="mt-2" />
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div>
        <x-input-label for="luas_tanah" :value="__('Luas Tanah (m²)')" />
        <x-text-input id="luas_tanah" class="block mt-1 w-full" type="number" name="luas_tanah" :value="old('luas_tanah', $tipeUnit->luas_tanah ?? '')" required />
        <x-input-error :messages="$errors->get('luas_tanah')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="luas_bangunan" :value="__('Luas Bangunan (m²)')" />
        <x-text-input id="luas_bangunan" class="block mt-1 w-full" type="number" name="luas_bangunan" :value="old('luas_bangunan', $tipeUnit->luas_bangunan ?? '')" required />
        <x-input-error :messages="$errors->get('luas_bangunan')" class="mt-2" />
    </div>
</div>

<div class="mt-4">
    <x-input-label for="deskripsi_singkat" :value="__('Deskripsi Singkat')" />
    <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('deskripsi_singkat', $tipeUnit->deskripsi_singkat ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('deskripsi_singkat')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="deskripsi_lengkap" :value="__('Deskripsi Lengkap')" />
    <textarea id="deskripsi_lengkap" name="deskripsi_lengkap" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('deskripsi_lengkap', $tipeUnit->deskripsi_lengkap ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('deskripsi_lengkap')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="thumbnail_path" :value="__('Thumbnail (Gambar Utama)')" />
    @isset($tipeUnit->thumbnail_path)
        <img src="{{ Storage::url($tipeUnit->thumbnail_path) }}" alt="Thumbnail" class="w-32 h-auto rounded my-2">
    @endisset
    <input id="thumbnail_path" name="thumbnail_path" type="file" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    <x-input-error :messages="$errors->get('thumbnail_path')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="denah_path" :value="__('Gambar Denah')" />
     @isset($tipeUnit->denah_path)
        <img src="{{ Storage::url($tipeUnit->denah_path) }}" alt="Denah" class="w-32 h-auto rounded my-2">
    @endisset
    <input id="denah_path" name="denah_path" type="file" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    <x-input-error :messages="$errors->get('denah_path')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('admin.tipe-unit.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
        Batal
    </a>

    <x-primary-button>
        {{ $submitText ?? 'Simpan' }}
    </x-primary-button>
</div>