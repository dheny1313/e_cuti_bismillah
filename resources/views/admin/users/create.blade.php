<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tambah User</h2>
    </x-slot>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        @include('admin.users._form', ['user' => $user, 'userdetail' => $userdetail])
        <button type="submit" class="mt-3 btn btn-primary">Simpan</button>
    </form>
</x-app-layout>
