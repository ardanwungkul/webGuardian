<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube as FacadesYoutube;
use App\Models\User;
use App\Models\Youtube;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YoutubeController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin == true) {
            $youtube = Youtube::all()->sortByDesc('created_at');
        } else {
            $youtube = Auth::user()->youtubes;
        }
        $users = User::where('isAdmin', false)->get();
        return view('master.youtube.index', compact('youtube', 'users'));
    }
    public function store(Request $request)
    {
        $url = $request->link_youtube;
        $segments = explode("/", $url);
        $url = 'https://www.youtube.com/embed/' . end($segments);

        $youtube = new Youtube();
        if ($request->thumbnail !== null) {
            $youtube->thumbnail = $request->thumbnail;
        } elseif ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/youtube', $nama_file);
            $youtube->image = $nama_file;
        }
        $youtube->link_youtube = $url;
        $youtube->judul = $request->judul;
        $youtube->keterangan = $request->keterangan;
        $youtube->save();
        $youtube->users()->syncWithoutDetaching($request->user_id);
        setcookie('isShowNotification', 'true');
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Youtube']);
    }
    public function update(Request $request, Youtube $youtube)
    {
        $file_path = public_path('storage/images/youtube/' . $youtube->image);
        if ($request->hasFile('image')) {
            if ($youtube->image !== null) {
                unlink($file_path);
            }
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/youtube/', $nama_file);
            $youtube->image = $nama_file;
            $youtube->thumbnail = null;
        }


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
        $file_path = public_path('storage/images/youtube/' . $youtube->image);
        if (file_exists($file_path)) {
            if ($youtube->image !== null) {
                unlink($file_path);
            }
        }
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Youtube']);
    }
    public function show(Youtube $youtube)
    {
        if (Auth::user()->isAdmin == true) {
            $youtubeAll = Youtube::all();
        } else {
            $youtubeAll = Auth::user()->youtubes;
        }
        return view('master.youtube.show', compact('youtube', 'youtubeAll'));
    }
    public function apiYoutube(Request $request)
    {
        $link_youtube = $request->link_youtube;
        $videoId = FacadesYoutube::parseVidFromURL($link_youtube);
        $apiKey = env('YOUTUBE_API_KEY');

        $client = new Client();
        $url = 'https://www.googleapis.com/youtube/v3/videos?key=' . $apiKey . '&id=' . $videoId . '&part=snippet,player';
        try {
            $response = $client->get($url);

            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $responseData = json_decode($response->getBody(), true);
                return response()->json($responseData);
            } else {
                return response()->json(['error' => 'Failed to fetch data from YouTube API'], $statusCode);
            }
        } catch (RequestException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
