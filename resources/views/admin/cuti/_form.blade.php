@csrf

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Pegawai</label>
    <select name="id_user" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">-- Pilih Pegawai --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('id_user', $cuti->id_user ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->user_detail->nama_lengkap ?? $user->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Perihal Cuti</label>
    <input type="text" name="perihal_cuti" value="{{ old('perihal_cuti', $cuti->perihal_cuti ?? '') }}"
           class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Alasan</label>
    <textarea name="alasan" rows="3" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('alasan', $cuti->alasan ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Diajukan</label>
        <input type="date" name="tgl_diajukan" value="{{ old('tgl_diajukan', $cuti->tgl_diajukan ?? now()->format('Y-m-d')) }}"
               class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Mulai Cuti</label>
        <input type="date" name="mulai" value="{{ old('mulai', $cuti->mulai ?? '') }}"
               class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Berakhir</label>
        <input type="date" name="berakhir" value="{{ old('berakhir', $cuti->berakhir ?? '') }}"
               class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700">Status</label>
    <select name="id_status_cuti" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">-- Pilih Status --</option>
        @foreach ($statuses as $status)
            <option value="{{ $status->id }}" {{ old('id_status_cuti', $cuti->id_status_cuti ?? '') == $status->id ? 'selected' : '' }}>
                {{ $status->nama_status }}
            </option>
        @endforeach
    </select>
</div>

<div class="mt-4">
    <label class="block text-sm font-medium text-gray-700">Alasan Verifikasi (Opsional)</label>
    <textarea name="alasan_verifikasi" rows="2" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('alasan_verifikasi', $cuti->alasan_verifikasi ?? '') }}</textarea>
</div>

<div class="mt-6">
    <button type="submit"
            class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
        Simpan
    </button>
</div>
