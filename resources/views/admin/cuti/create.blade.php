<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tambah Pengajuan Cuti
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow-sm">
            <form action="{{ route('cuti.store') }}" method="POST">
                @include('admin.cuti._form', ['cuti' => new \App\Models\Cuti])
            </form>
        </div>
    </div>
</x-app-layout>
