<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Domain;
use GuzzleHttp\Client;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Woowa\Woowa;
use Alaouy\Youtube\Facades\Youtube;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;

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
        $isDomain = Domain::count();
        $domain = Domain::with('kategori')->get();
        try {
            $apiResponse = Http::get('https://client.webz.biz/api/domain');

            if ($apiResponse->successful()) {
                $apiDomain = $apiResponse->json();
            } else {
                $apiDomain = [];
            }
        } catch (Exception $e) {
            $apiDomain = [];
        }
        // $matchingDomain = collect($apiDomain)->filter(function ($apiDomainItem) use ($domain) {
        //     return $domain->contains(function ($dbDomain) use ($apiDomainItem) {
        //         return Str::lower(trim($dbDomain->nama_domain)) === Str::lower(trim($apiDomainItem['nama_domain']));
        //     });
        // });
        //         $matchingDomain = collect($apiDomain)->filter(function ($apiDomain) use ($domain) {
        //     // dd($apiDomain['nama_domain'], $domain->pluck('nama_domain')->toArray());
        //     return $domain->contains(function ($dbDomain) use ($apiDomain) {
        //         return strtolower(trim($dbDomain->nama_domain)) === strtolower(trim($apiDomain['nama_domain']));
        //     });
        // });

        // dd($matchingDomain);
        // $matchingDomain = (strtolower($domain->nama_domain) === strtolower($apiDomain['nama_domain']));
        // dd($matchingDomain);
        // Hitung jumlah domain expired
        // $expired = collect($apiDomain)->filter(fn($item) => Carbon::parse($item['tanggal_expired'])->isBefore(Carbon::today()))->count();

        // Hitung jumlah domain aktif (yang tidak expired)
        // $active = $isDomain - $expired;
        // dd($active);
        return view('dashboard', compact(
            'kategori',
            'user',
            'domain',
            'apiDomain',
            'isDomain',
            // 'expired',
            // 'active'
        ));
    }

    public function getCategoryData($kategoriId)
    {
        $apiResponse = Http::get('https://client.webz.biz/api/domain');
        $apiDomain = $apiResponse->json();
        $domains = Domain::where('kategori_id', $kategoriId)->with('user')->get();
        return response()->json(['domains' => $domains, 'apiDomain' => $apiDomain]);
    }
    public function getDomainDetails($domainId)
    {
        // $apiResponse = Http::get('https://client.webz.biz/api/domain');
        // $apiDomain = $apiResponse->json();
        $domains = Domain::where('id', $domainId)->with('user')->get();
        return response()->json(['domains' => $domains]);
    }
}
