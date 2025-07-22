<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('users.create') }}"
               class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 active:bg-indigo-600 disabled:opacity-25">
                + Tambah Pengguna
            </a>
        </div>

        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">#</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Username</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Level</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">nama lengkap</th>
                        <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   {{-- <pre>{{ dd($users) }}</pre> --}}
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->username }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->user_level->user_level ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $user->user_detail->nama_lengkap ?? '-' }}</td>
                            <td class="flex px-4 py-2 space-x-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
