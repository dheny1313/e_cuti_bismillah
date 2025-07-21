<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Detail Pengguna') }}
        </h2>
    </x-slot>

   <div class="max-w-3xl py-6 mx-auto sm:px-6 lg:px-8">
    <div class="p-4 bg-white rounded shadow">
        <form action="{{ route('user-details.update', $userDetail->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.user_details._form', ['userDetail' => $userDetail, 'jenisKelaminList' => $jenisKelaminList])
        </form>
    </div>
</div>
</x-app-layout>
