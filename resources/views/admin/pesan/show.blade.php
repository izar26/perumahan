<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pesan
            </h2>
            <a href="{{ route('admin.pesan.index') }}" class="text-sm text-blue-600 hover:underline">
                &larr; Kembali ke Daftar Pesan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="border-b pb-4 mb-4">
                        <h3 class="text-2xl font-bold">{{ $pesan->subjek }}</h3>
                        <div class="text-sm text-gray-500 mt-2">
                            <p><strong>Dari:</strong> {{ $pesan->nama }}</p>
                            <p><strong>Kontak:</strong> {{ $pesan->kontak }}</p>
                            <p><strong>Diterima:</strong> {{ $pesan->created_at->format('d F Y \p\u\k\u\l H:i') }}</p>
                        </div>
                    </div>

                    <div class="prose max-w-none">
                        <p>{{ $pesan->isi_pesan }}</p>
                    </div>

                    <div class="mt-6 border-t pt-4 flex justify-end">
                        <form action="{{ route('admin.pesan.destroy', $pesan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>