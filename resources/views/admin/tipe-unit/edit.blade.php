<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tipe Unit: ') . $tipeUnit->nama_tipe }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- FORM UTAMA UNTUK EDIT DETAIL TIPE UNIT --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <form method="POST" action="{{ route('admin.tipe-unit.update', $tipeUnit) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.tipe-unit._form', ['submitText' => 'Update Unit'])
                    </form>
                </div>
            </div>
        </div>

        {{-- BAGIAN BARU: MANAJEMEN GALERI FOTO --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Manajemen Galeri Foto</h3>

                    <form action="{{ route('admin.tipe-unit.photos.store', $tipeUnit) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="photos" :value="__('Upload Foto Baru (Bisa Pilih Banyak)')" />
                            <input id="photos" name="photos[]" type="file" multiple class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <x-input-error :messages="$errors->get('photos.*')" class="mt-2" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Upload') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="mt-6 border-t pt-6">
                        <h4 class="font-semibold mb-4">Galeri Saat Ini</h4>
                        @if ($tipeUnit->photos->isEmpty())
                            <p class="text-gray-500">Belum ada foto di galeri.</p>
                        @else
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($tipeUnit->photos as $photo)
                                    <div class="relative group">
                                        <img src="{{ Storage::url($photo->path) }}" class="w-full h-32 object-cover rounded-md">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white text-xs bg-red-600 hover:bg-red-700 rounded-full p-2" onclick="return confirm('Yakin ingin hapus foto ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>