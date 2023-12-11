<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtube = Youtube::all()->sortByDesc('created_at');
        return view('master.youtube.index', compact('youtube'));
    }
    public function store(Request $request)
    {
        $url = $request->link_youtube;
        $segments = explode("/", $url);
        $url = 'https://www.youtube.com/embed/' . end($segments);
        $youtube = new Youtube();
        $youtube->link_youtube = $url;
        $youtube->judul = $request->judul;
        $youtube->keterangan = $request->keterangan;
        $youtube->save();
        setcookie('isShowNotification', 'true');
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Youtube']);
    }
    public function update(Request $request, Youtube $youtube)
    {
        $url = $request->link_youtube;
        $segments = explode("/", $url);
        $url = 'https://www.youtube.com/embed/' . end($segments);
        $youtube->link_youtube = $url;
        $youtube->judul = $request->judul;
        $youtube->keterangan = $request->keterangan;
        $youtube->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Youtube']);
    }

    public function destroy(Youtube $youtube)
    {
        $youtube->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Youtube']);
    }
    public function show(Youtube $youtube)
    {
        $youtubeAll = Youtube::all();
        return view('master.youtube.show', compact('youtube', 'youtubeAll'));
    }
}
