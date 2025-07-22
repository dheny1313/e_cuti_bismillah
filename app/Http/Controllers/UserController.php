<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisKelamin;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['user_level', 'user_detail'])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create', [
            'user' => new User(),
            'userdetail' => new UserDetail(),
            'levels' => UserLevel::all(),
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'required|string|min:6',
            'user_level_id' => 'nullable|exists:user_levels,id',
        ]);

        $validatedDetail = $request->validate([
            'nama_lengkap' => 'nullable|string|max:255',
            'jenis_kelamin_id' => 'nullable|integer',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
            'pangkat' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
        ]);

        $user = new User($validatedUser);
        $user->password = Hash::make($validatedUser['password']);
        $user->save();

        $userDetail = new UserDetail($validatedDetail);
        $userDetail->user_id = $user->id;
        $userDetail->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'userdetail' => $user->user_detail ?? new UserDetail(),
            'levels' => UserLevel::all(),
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users,username,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'user_level_id' => 'nullable|exists:user_levels,id',
        ]);

        $validatedDetail = $request->validate([
            'nama_lengkap' => 'nullable|string|max:255',
            'jenis_kelamin_id' => 'nullable|integer',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
            'pangkat' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
        ]);

        if ($validatedUser['password']) {
            $validatedUser['password'] = Hash::make($validatedUser['password']);
        } else {
            unset($validatedUser['password']);
        }

        $user->update($validatedUser);

        $userDetail = $user->user_detail ?: new UserDetail(['user_id' => $user->id]);
        $userDetail->fill($validatedDetail)->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
