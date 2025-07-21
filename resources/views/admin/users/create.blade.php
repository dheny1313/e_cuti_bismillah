<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tambah Pengguna
        </h2>
    </x-slot>

    <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white shadow sm:rounded-lg">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                @include('admin.users._form', ['user' => new \App\Models\User])

                <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
