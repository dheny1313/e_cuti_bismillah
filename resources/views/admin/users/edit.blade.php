<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit User</h2>
    </x-slot>

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        @include('admin.users._form', ['user' => $user, 'userdetail' => $userdetail])
        <button type="submit" class="mt-3 btn btn-primary">Update</button>
    </form>
</x-app-layout>
