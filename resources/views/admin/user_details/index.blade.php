<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Detail Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('user-details.create') }}"
               class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah Detail</a>
        </div>

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama Lengkap</th>
                        <th class="px-4 py-2">Jenis Kelamin</th>
                        <th class="px-4 py-2">NIP</th>
                        <th class="px-4 py-2">Jabatan</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($userDetails as $detail)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $detail->nama_lengkap }}</td>
                            <td class="px-4 py-2">{{ $detail->jenisKelamin->jenis_kelamin ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $detail->nip }}</td>
                            <td class="px-4 py-2">{{ $detail->jabatan }}</td>
                            <td class="flex gap-2 px-4 py-2">
                                <a href="{{ route('user-details.edit', $detail->id) }}"
                                   class="text-blue-600 hover:text-blue-800">
                                    ✏️
                                </a>
                                <form action="{{ route('user-details.destroy', $detail->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
