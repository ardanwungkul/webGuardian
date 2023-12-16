<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function getData(Request $request)
    {
        $data = Domain::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                                <a href="/reports/create/' . $row->id . '">
                                    Buat Report
                                </a>
                                <a href="/reports/result/' . $row->id . '" target="_blank">
                                    Hasil Report
                                </a>
                                <button class="editButton" data-domain-id="' . $row->id . '" data-domain-id="' . $row->id . '">
                                Edit
                            </button>
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
        $report->save();
        return redirect()->route('dashboard')->with(['success' => 'Report Berhasil Ditambahkan']);
    }
    public function result(Domain $domain)
    {
        if (Auth::user()->isAdmin == true) {
            $report = Report::where('domain_id', $domain->id)->get();
            return view('report', compact('domain', 'report'));
        } else {
            return redirect()->back();
        }
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
        $report->save();
        return redirect()->back()->with(['success' => 'Report Berhasil Diubah']);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->with(['success' => 'Report Berhasil Dihapus']);
    }
}
