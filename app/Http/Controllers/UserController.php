<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['user_level', 'user_detail'])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user_levels = UserLevel::all();
        return view('admin.users.create', compact('user_levels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable|string|',
            'user_level_id' => 'nullable|exists:user_levels,id',
        ]);

        $detail = UserDetail::create([]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['user_detail_id'] = $detail->id;

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $user_levels = UserLevel::all();
        return view('admin.users.edit', compact('user', 'user_levels'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|',
            'user_level_id' => 'nullable|exists:user_levels,id',
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
