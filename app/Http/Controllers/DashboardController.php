<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kategori = Kategori::all();
        $user = User::where('isAdmin', false)->get();
        $domain = Domain::all();
        return view('dashboard', compact('kategori', 'user', 'domain'));
    }
}
