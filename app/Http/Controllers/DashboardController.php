<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Domain;
use App\Models\Kategori;
use App\Models\User;
use App\Services\Woowa\Woowa;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->isAdmin == true) {
            $kategori = Kategori::all();
        } else {
            $kategori = Kategori::whereHas('domain', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->get();
        }
        $user = User::where('isAdmin', false)->get();
        $domain = Domain::all();
        $apiResponse = Http::get('https://client.webz.biz/api/domain');
        $apiDomain = $apiResponse->json();
        return view('dashboard', compact(
            'kategori',
            'user',
            'domain',
            'apiDomain'
        ));
    }
}
