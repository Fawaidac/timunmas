<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display list of users.
     */
    public function index()
    {
        $users = Pengguna::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show form to create new user.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_user' => 'required|unique:mst_pengguna,nm_user|max:50',
            'kata_kunci' => 'required|min:6',
            'no_otor' => 'required|unique:mst_pengguna,no_otor|max:50',
            'role' => 'required|in:admin,sales',
            'nama_lengkap' => 'required|max:100',
            'email' => 'nullable|email|max:100'
        ]);

        Pengguna::create([
            'nm_user' => $request->nm_user,
            'kata_kunci' => Hash::make($request->kata_kunci),
            'no_otor' => $request->no_otor,
            'role' => $request->role,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $user = Pengguna::where('no_otor', $id)->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update user.
     */
    public function update(Request $request, $id)
    {
        $user = Pengguna::where('no_otor', $id)->firstOrFail();

        $request->validate([
            'nm_user' => 'required|max:50|unique:mst_pengguna,nm_user,' . $user->no_otor . ',no_otor',
            'kata_kunci' => 'nullable|min:6',
            'role' => 'required|in:admin,sales',
            'nama_lengkap' => 'required|max:100',
            'email' => 'nullable|email|max:100'
        ]);

        $data = [
            'nm_user' => $request->nm_user,
            'role' => $request->role,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email
        ];

        if ($request->filled('kata_kunci')) {
            $data['kata_kunci'] = Hash::make($request->kata_kunci);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * Delete user.
     */
    public function destroy($id)
    {
        $user = Pengguna::where('no_otor', $id)->firstOrFail();
        
        if ($user->nm_user === 'admin') {
            return redirect()->route('admin.user.index')->with('error', 'User admin tidak boleh dihapus');
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }
}
