<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Folder;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $folder = Folder::all();
        return view('master.folder.index', compact('folder', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('master.folder.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->spintax = $request->spintax;
        $folder->save();

        $folder->domain()->syncWithoutDetaching($request->domain_id);
        return redirect()->route('folder.index')->with(['success' => 'Berhasil Menambahkan Spintax']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
