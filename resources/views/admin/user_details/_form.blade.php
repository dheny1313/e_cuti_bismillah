<div class="space-y-4">
    <div>
        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap"
               value="{{ old('nama_lengkap', $userDetail->nama_lengkap) }}"
               class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="jenis_kelamin_id" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select name="jenis_kelamin_id" id="jenis_kelamin_id"
                class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">-- Pilih Jenis Kelamin --</option>
            @foreach ($jenisKelaminList as $jk)
                <option value="{{ $jk->id }}" {{ old('jenis_kelamin_id', $userDetail->jenis_kelamin_id) == $jk->id ? 'selected' : '' }}>
                    {{ $jk->jenis_kelamin}}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
        <input type="text" name="nip" id="nip"
               value="{{ old('nip', $userDetail->nip) }}"
               class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telp</label>
        <input type="text" name="no_telp" id="no_telp"
               value="{{ old('no_telp', $userDetail->no_telp) }}"
               class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" id="alamat"
                  class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
                  rows="3">{{ old('alamat', $userDetail->alamat) }}</textarea>
    </div>

    <div>
        <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat</label>
        <input type="text" name="pangkat" id="pangkat"
               value="{{ old('pangkat', $userDetail->pangkat) }}"
               class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan"
               value="{{ old('jabatan', $userDetail->jabatan) }}"
               class="w-full mt-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="pt-4">
        <button type="submit"
                class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('user-details.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </div>
</div>
