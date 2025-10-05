<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3">Pengirim</th>
                                    <th scope="col" class="px-6 py-3">Subjek</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pesans as $pesan)
                                <tr class="bg-white border-b hover:bg-gray-50 {{ !$pesan->sudah_dibaca ? 'font-bold' : '' }}">
                                    <td class="px-6 py-4">{{ $pesan->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-4">{{ $pesan->nama }}</td>
                                    <td class="px-6 py-4">{{ $pesan->subjek }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.pesan.show', $pesan) }}" class="font-medium text-blue-600 hover:underline">Lihat</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">Tidak ada pesan masuk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $pesans->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>