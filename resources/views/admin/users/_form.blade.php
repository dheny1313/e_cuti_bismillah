<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Depan</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Belakang</label>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" {{ $user->exists ? '' : 'required' }}>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Level User</label>
        <select name="user_level_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            <option value="">-- Pilih Level --</option>
            @foreach ($user_levels as $level)
                <option value="{{ $level->id }}" {{ old('user_level_id', $user->user_level_id) == $level->id ? 'selected' : '' }}>
                    {{ $level->user_level }}
                </option>
            @endforeach
        </select>
    </div>
</div>
