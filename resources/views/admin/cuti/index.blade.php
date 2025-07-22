<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen Pengajuan Cuti') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('cuti.create') }}"
               class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
                + Tambah Pengajuan Cuti
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">ID Cuti</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Nama Pegawai</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Perihal</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal Diajukan</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($cutis as $cuti)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $cuti->id_cuti }}</td>
                            <td class="px-4 py-2">{{ $cuti->user->user_detail->nama_lengkap ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $cuti->perihal_cuti }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cuti->tgl_diajukan)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs text-white rounded bg-{{ $cuti->status->color ?? 'gray-500' }}">
                                    {{ $cuti->status->nama_status ?? '-' }}
                                </span>
                            </td>
                            <td class="flex px-4 py-2 space-x-2">
                                <a href="{{ route('cuti.edit', $cuti->id_cuti) }}"
                                   class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('cuti.destroy', $cuti->id_cuti) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($cutis->isEmpty())
                        <tr>
                            <td colspan="7" class="px-4 py-2 text-center text-gray-500">Belum ada data cuti</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
