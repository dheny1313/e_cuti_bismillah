<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen Detail Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">User ID</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Nama Lengkap</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">No. Telepon</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Alamat</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">NIP</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Pangkat</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-gray-500 uppercase">Jabatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($user_details as $detail)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration + ($user_details->currentPage() - 1) * $user_details->perPage() }}</td>
                            <td class="px-4 py-2">{{ $detail->user_id }}</td>
                            <td class="px-4 py-2">{{ $detail->user->email ?? 'tidak ada email'}}</td>
                            <td class="px-4 py-2">{{ $detail->nama_lengkap }}</td>
                            <td class="px-4 py-2">{{ $detail->jenis_kelamin->jenis_kelamin ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $detail->no_telp }}</td>
                            <td class="px-4 py-2">{{ $detail->alamat }}</td>
                            <td class="px-4 py-2">{{ $detail->nip }}</td>
                            <td class="px-4 py-2">{{ $detail->pangkat }}</td>
                            <td class="px-4 py-2">{{ $detail->jabatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-4 text-center text-gray-500">Tidak ada data detail user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $user_details->links() }}
        </div>
    </div>
</x-app-layout>
