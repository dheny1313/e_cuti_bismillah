@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $user->username ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>

        <div class="mb-3">
            <label for="user_level_id" class="form-label">Level</label>
            <select name="user_level_id" id="user_level_id" class="form-select">
                <option value="">-- Pilih Level --</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}" {{ old('user_level_id', $user->user_level_id ?? '') == $level->id ? 'selected' : '' }}>
                        {{ $level->user_level }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Kolom Data User Detail --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $userdetail->nama_lengkap ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin_id" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin_id" id="jenis_kelamin_id" class="form-select">
                <option value="">-- Pilih Jenis Kelamin --</option>
                @foreach ($jenis_kelamin as $jk)
                    <option value="{{ $jk->id }}" {{ old('jenis_kelamin_id', $userdetail->jenis_kelamin_id ?? '') == $jk->id ? 'selected' : '' }}>
                        {{ $jk->jenis_kelamin }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ old('no_telp', $userdetail->no_telp ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="2">{{ old('alamat', $userdetail->alamat ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" id="nip" value="{{ old('nip', $userdetail->nip ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="pangkat" class="form-label">Pangkat</label>
            <input type="text" class="form-control" name="pangkat" id="pangkat" value="{{ old('pangkat', $userdetail->pangkat ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ old('jabatan', $userdetail->jabatan ?? '') }}">
        </div>
    </div>
</div>
