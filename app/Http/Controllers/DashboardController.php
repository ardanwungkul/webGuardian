<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Domain;
use App\Models\Kategori;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
