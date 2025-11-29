<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        // Hanya Admin yang boleh akses
        if(auth()->user()->role !== 'admin') { abort(403); }

        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'admin') { abort(403); }
        return view('users.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin') { abort(403); }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,manager,staff,operator'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // <--- Ini kuncinya! Admin yang tentukan role.
        ]);

        return redirect()->route('users.index')->with('success', 'User baru berhasil dibuat!');
    }

    public function edit(User $user)
    {
        if(auth()->user()->role !== 'admin') { abort(403); }
        return view('users.edit', compact('user'));
    }

    // 2. SIMPAN PERUBAHAN (UPDATE)
    public function update(Request $request, User $user)
    {
        if(auth()->user()->role !== 'admin') { abort(403); }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Validasi Email unik, KECUALI punya user ini sendiri (biar ga error kalau email ga diganti)
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'role' => ['required', 'in:admin,manager,staff,operator'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            // Password tidak kita update disini agar tidak mereset password lama
        ]);

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        if(auth()->user()->role !== 'admin') { abort(403); }
        // Jangan hapus diri sendiri
        if($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}