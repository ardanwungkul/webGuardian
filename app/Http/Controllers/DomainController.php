<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Kategori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isAdmin = Auth::user()->isAdmin;
        $kategori = Kategori::all();
        $user = User::where('isAdmin', false)->get();
        $apiResponse = Http::get('https://client.webz.biz/api/domain');
        $apiDomain = $apiResponse->json();
        if (Auth::user()->isAdmin == true) {
            $domain = Domain::all();
        } else {
            $domain = Domain::where('user_id', Auth::user()->id)->get();
        }
        return view('master.domain.index', compact('domain', 'kategori', 'user', 'isAdmin', 'apiDomain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $domain = new Domain();
        $domain->nama_domain = $request->nama_domain;
        $domain->kategori_id = $request->kategori_id;
        $domain->user_id = $request->user_id;
        $domain->catatan = $request->catatan;
        $slug = Str::slug($request->nama_domain);
        for ($i = 0; $i < 10; $i++) {
            $randomWord = Str::random(5);
            $slug .= '-' . $randomWord;
        }
        $domain->slug = $slug;
        $domain->save();
        if ($request->report || $request->report !== null) {
            $domain->report = $request->report;
        } else {
            $domain->report = config('app.url') . '/reports/result/' . $domain->id . '/' . $domain->slug;
            $domain->internalReport = true;
        }
        $domain->save();
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Domain']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domain $domain)
    {
        if ($domain->slug == null || $domain->slug == '') {
            $slug = Str::slug($domain->nama_domain);
            for ($i = 0; $i < 10; $i++) {
                $randomWord = Str::random(5);
                $slug .= '-' . $randomWord;
            }
            $domain->slug = $slug;
        }
        if ($request->has('internalReport')) {
            if ($request->internalReport == 'on') {
                $domain->internalReport = true;
            }
        } else {
            $domain->internalReport = false;
        }
        $domain->fill($request->all())->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengedit Domain']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Domain']);
    }
    public function destroys(Domain $domain)
    {
        $domain->delete();
        return response('Domain Berhasil Dihapus');
    }
    public function statusKeterangan(Request $request)
    {
        $domain = Domain::findOrFail($request->domain);
        $domain->status_keterangan = $request->status_keterangan;
        $domain->save();
        return response('Berhasil Mengubah Status');
    }
    public function statusNerd(Request $request)
    {
        $domain = Domain::findOrFail($request->domain);
        $domain->status_nerd = $request->status_nerd;
        if ($request->status_nerd == 'Done') {
            $domain->status_nerd_update = Carbon::now();
        }
        $domain->save();
        return response('Berhasil Mengubah Status');
    }
    public function statusSitemap(Request $request)
    {
        $domain = Domain::findOrFail($request->domain);
        $domain->status_sitemap = $request->status_sitemap;
        $domain->save();
        return response('Berhasil Mengubah Status');
    }
    public function getData(Request $request)
    {
        if (Auth::user()->isAdmin == true) {
            $data = Domain::with('user', 'kategori')->get();
        } else {
            $data = Domain::where('user_id', Auth::user()->id)->with('user', 'kategori')->get();
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
