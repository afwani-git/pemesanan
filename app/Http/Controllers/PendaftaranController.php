<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PendaftaranReq;
use App\Models\Workshop;

class PendaftaranController extends Controller
{
    public function daftar(PendaftaranReq $req)
    {
        $validated = $req->validated();
        $workshop = new workshop();
        $workshop->find($validated['workshop'])->pemesan()->create([
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'kota' => $validated['kota'],
            'tlp' => $validated['telepon'],
            'catatan' => $validated['catatan']
        ]);

        return view('success');
    }

    public function pilihanPage()
    {
        $workshop = Workshop::all();
        return view('pilihan', ['workshops' => $workshop]);
    }

    public function daftarPage($id)
    {
        $workshop = Workshop::find($id);
        return view('daftar', ['workshop' => $workshop]);
    }
}
