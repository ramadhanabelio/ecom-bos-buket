<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        if ($user->role !== 'user') {
            abort(404);
        }

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if ($user->role !== 'user') {
            abort(404);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'user') {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email:dns|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'username', 'phone_number', 'address', 'email']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'user') {
            abort(404);
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}
