<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Pengajuan Cuti
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow-sm">
            <form action="{{ route('cuti.update', $cuti->id_cuti) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.cuti._form', ['cuti' => $cuti])
            </form>
        </div>
    </div>
</x-app-layout>
