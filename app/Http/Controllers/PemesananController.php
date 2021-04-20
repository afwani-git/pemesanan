<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\workshop;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        return redirect()->back();
    }

    public function process($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->process =  $pemesanan->process == 1 ? 0 : 1;
        $pemesanan->save();
        return redirect()->back();
    }

    public function buatLaporan()
    {
    }
}
