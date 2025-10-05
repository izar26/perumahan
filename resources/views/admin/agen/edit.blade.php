<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Agen: ') . $agen->nama_agen }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <form method="POST" action="{{ route('admin.agen.update', $agen) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.agen._form', ['submitText' => 'Update Agen'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>