<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WorkshopReq;
use App\Models\Workshop;

class WorkshopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(WorkshopReq $req)
    {
        $validated = $req->validated();

        $fileName = $req->file('gambar')->getClientOriginalName();
        $req->file('gambar')->storeAs("/public/", $fileName);

        $validated["gambar"] = $fileName;
        $newWorkshop = workshop::create($validated);

        $newWorkshop->save();

        return redirect()->back();
    }

    public function update(WorkshopReq $req, $id)
    {
        $validated = $req->validated();
        $workshop = workshop::find($id);

        Storage::delete("/public/" . $workshop['gambar']);

        $fileName = $req->file('gambar')->getClientOriginalName();
        $req->file('gambar')->storeAs("/public/", $fileName);

        $validated["gambar"] = $fileName;

        $workshop->update($validated);

        return redirect()->back();
    }

    public function delete($id)
    {
        $workshop = workshop::find($id);
        Storage::delete("/public/" . $workshop['gambar']);
        $workshop->delete();

        return redirect()->back();
    }
}
