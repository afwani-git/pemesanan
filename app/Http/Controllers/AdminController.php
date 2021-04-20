<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Workshop;
use PDF;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardPage()
    {
        return view('admin/index');
    }

    public function workshopPage()
    {
        $workshop = workshop::all();
        $no = 1;
        return view('admin.workshop', ['workshops' => $workshop, 'no' => $no]);
    }

    public function pemesananPage()
    {
        $pemesanan = new Pemesanan();

        $processed = $pemesanan::where('process', true)->with(['workshop'])->get();
        $unProcessed = $pemesanan::where('process', false)->with(['workshop'])->get();

        return view('admin.pemesanan', ['processeds' => $processed, 'unProcesseds' => $unProcessed]);
    }

    public function laporanPage()
    {
        $allWorkshop = workshop::with(['pemesan' => function ($query) {
            $query->where('process', true);
        }])->get();

        $pdf = PDF::loadview('report', ['laporan' => $allWorkshop]);
        return $pdf->download('report');
    }
}
