<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('isAdmin', false)->get();
        return view('master.user.index', compact('user'));
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all())->save();
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan User']);
    }
    public function update(Request $request, User $user)
    {
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->no_hp) {
            $user->no_hp = $request->no_hp;
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah User']);
    }
    public function show(User $user)
    {
        $users = User::where('isAdmin', false);
        $kategori = Kategori::all();
        return view('master.user.show', compact('user', 'kategori', 'users'));
    }
}
