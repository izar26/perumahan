<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Agen Marketing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Daftar Agen</h3>
                        <a href="{{ route('admin.agen.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Tambah Agen
                        </a>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Foto</th>
                                    <th scope="col" class="px-6 py-3">Nama Agen</th>
                                    <th scope="col" class="px-6 py-3">Jabatan</th>
                                    <th scope="col" class="px-6 py-3">Nomor WA</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($agens as $agen)
                                <tr class="bg-white border-b hover:bg-gray-50 align-middle">
                                    <td class="px-6 py-4">
                                        <img src="{{ Storage::url($agen->foto_path) }}" alt="{{ $agen->nama_agen }}" class="w-12 h-12 rounded-full object-cover">
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $agen->nama_agen }}
                                    </th>
                                    <td class="px-6 py-4">{{ $agen->jabatan }}</td>
                                    <td class="px-6 py-4">{{ $agen->nomor_wa }}</td>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <a href="{{ route('admin.agen.edit', $agen) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('admin.agen.destroy', $agen) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">Tidak ada data agen.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-4">
                        {{ $agens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>