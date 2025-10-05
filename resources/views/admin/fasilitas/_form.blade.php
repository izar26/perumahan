{{-- resources/views/admin/fasilitas/_form.blade.php --}}

@csrf
<div>
    <x-input-label for="nama_fasilitas" :value="__('Nama Fasilitas')" />
    <x-text-input id="nama_fasilitas" class="block mt-1 w-full" type="text" name="nama_fasilitas" :value="old('nama_fasilitas', $fasilita->nama_fasilitas ?? '')" required autofocus />
    <x-input-error :messages="$errors->get('nama_fasilitas')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="icon_path" :value="__('Ikon (SVG, PNG, JPG)')" />
    @isset($fasilita->icon_path)
        <img src="{{ Storage::url($fasilita->icon_path) }}" alt="Ikon" class="w-16 h-16 rounded my-2">
    @endisset
    <input id="icon_path" name="icon_path" type="file" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    <x-input-error :messages="$errors->get('icon_path')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('admin.fasilitas.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
        Batal
    </a>

    <x-primary-button>
        {{ $submitText ?? 'Simpan' }}
    </x-primary-button>
</div>