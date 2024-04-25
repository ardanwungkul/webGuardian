<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Report;
use App\Models\User;
use App\Services\Woowa\Woowa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function getData(Request $request)
    {
        if (Auth::user()->isAdmin == true) {
            $data = Domain::with('user', 'kategori', 'reports')->get();
        } else {
            $data = Domain::where('user_id', Auth::user()->id)->with('user', 'kategori', 'reports')->get();
        }
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                                <a href="/reports/create/' . $row->id . '" class="fa-solid fa-plus">
                                </a>
                                <button class="editButton fa-solid fa-pen" data-domain-id="' . $row->id . '" data-domain-id="' . $row->id . '">
                                </button>
                                <a href="' . $row->report . '" target="_blank" class="fa-solid fa-list">
                                </a>
                            </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function index()
    {
        $domain = Domain::all();
        return view('master.report.index', compact('domain'));
    }
    public function createReport(Domain $domain)
    {
        return view('master.report.create', compact('domain'));
    }
    public function store(Request $request, Domain $domain)
    {
        $report = new Report();
        $report->judul = $request->judul;
        $report->report = $request->report;
        $report->tanggal_report = $request->tanggal_report;
        $report->domain_id = $domain->id;
        if ($request->link_youtube !== null) {
            $url = $request->link_youtube;
            $segments = explode("/", $url);
            $url = 'https://www.youtube.com/embed/' . end($segments);
            $report->link_youtube = $url;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/report', $nama_file);
            $report->image = $nama_file;
        } else {
            $report->image = 'placeholder.png';
        }
        $report->save();
        $whatsapp = new Woowa();
        $messages = Auth::user()->name . ' Telah membuat laporan untuk domain ' . $report->domain->nama_domain;
        $whatsapp->sendWhatsapp('081223410886', $messages);
        return redirect()->route('report.index')->with(['success' => 'Report Berhasil Ditambahkan']);
    }
    public function result(Domain $domain, $slug)
    {
        $report = Report::where('domain_id', $domain->id)->get();
        return view('report', compact('domain', 'report'));
    }
    public function reportUser(User $user)
    {
        $domain = Domain::whereHas('reports')->where('user_id', $user->id)->get();
        return view('reportUser', compact('domain'));
    }
    public function edit(Report $report)
    {
        return view('master.report.edit', compact('report'));
    }
    public function update(Report $report, Request $request)
    {
        $report->judul = $request->judul;
        $report->report = $request->report;
        $report->tanggal_report = $request->tanggal_report;
        if ($request->link_youtube !== null) {
            $url = $request->link_youtube;
            $segments = explode("/", $url);
            $url = 'https://www.youtube.com/embed/' . end($segments);
            $report->link_youtube = $url;
        } else {
            $report->link_youtube = null;
        }
        $file_path = public_path('storage/images/report/' . $report->image);
        if ($request->hasFile('image')) {
            if ($report->image !== 'placeholder.png') {
                unlink($file_path);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = date('YmdHi') . $file->getClientOriginalName();
            $file->move('storage/images/report', $nama_file);
            $report->image = $nama_file;
        }
        $report->save();
        return redirect()->back()->with(['success' => 'Report Berhasil Diubah']);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->with(['success' => 'Report Berhasil Dihapus']);
    }
}
