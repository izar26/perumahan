{{-- resources/views/admin/fasilitas/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Fasilitas Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <form method="POST" action="{{ route('admin.fasilitas.store') }}" enctype="multipart/form-data">
                        @include('admin.fasilitas._form', ['submitText' => 'Tambah Fasilitas'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>