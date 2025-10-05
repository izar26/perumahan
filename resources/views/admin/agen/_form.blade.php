@csrf
<div>
    <x-input-label for="nama_agen" :value="__('Nama Agen')" />
    <x-text-input id="nama_agen" class="block mt-1 w-full" type="text" name="nama_agen" :value="old('nama_agen', $agen->nama_agen ?? '')" required autofocus />
    <x-input-error :messages="$errors->get('nama_agen')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="jabatan" :value="__('Jabatan')" />
    <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan', $agen->jabatan ?? 'Marketing Executive')" required />
    <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="nomor_wa" :value="__('Nomor WhatsApp')" />
    <x-text-input id="nomor_wa" class="block mt-1 w-full" type="text" name="nomor_wa" :value="old('nomor_wa', $agen->nomor_wa ?? '')" required />
    <small class="text-gray-500">Gunakan format 628... (tanpa + atau 0 di depan).</small>
    <x-input-error :messages="$errors->get('nomor_wa')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="foto_path" :value="__('Foto Profil')" />
    @isset($agen->foto_path)
        <img src="{{ Storage::url($agen->foto_path) }}" alt="Foto" class="w-24 h-24 rounded-full my-2 object-cover">
    @endisset
    <input id="foto_path" name="foto_path" type="file" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    <x-input-error :messages="$errors->get('foto_path')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('admin.agen.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
        Batal
    </a>
    <x-primary-button>
        {{ $submitText ?? 'Simpan' }}
    </x-primary-button>
</div>