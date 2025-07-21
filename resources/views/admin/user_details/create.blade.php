<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Detail Pengguna') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl py-6 mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white rounded shadow">
            <form action="{{ route('user-details.store') }}" method="POST">
                @csrf
                @include('admin.user_details._form', ['detail' => new \App\Models\UserDetail])
            </form>
        </div>
    </div>
</x-app-layout>
