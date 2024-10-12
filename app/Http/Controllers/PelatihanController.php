<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::all();
        return view('pelatihan.index',[
            "title"=>"Pelatihan",
            "data"=>$pelatihan
        ]);
    }

    public function create():View
    {
        return view('pelatihan.create')->with([
            "title"=>"Tambah Data Pelatihan",
            "data"=> Pelatihan::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "judul"=>"required",
            "tanggal"=> "required",
            "lokasi"=>"required",
            "materi"=> "required",
            "pemateri"=> "required"
        ]);

        Pelatihan::create($request->all());
        return redirect()->route('pelatihan.index')->with('succes','Data Produk Berhasil Ditambahkan');
    }

    public function destroy($id):RedirectResponse
    {
        Pelatihan::where('id',$id)->delete();
        return redirect()->route('pelatihan.index')->with('deleted','Data Pelatihan Berhasil Dihapus');
    }

    public function edit(Pelatihan $pelatihan): View
    {
        return view('pelatihan.edit',compact('pelatihan'))->with([
            "title"=>"Ubah Data Pelatihan",
            "data"=> Pelatihan::all()
        ]);
    }

    public function update(Pelatihan $pelatihan, Request $request):RedirectResponse
    {
        $request->validate([
            "judul"=>"required",
            "tanggal"=> "required",
            "lokasi"=> "required",
            "materi"=> "required",
            "pemateri"=>"required"
        ]);

        $pelatihan->update($request->all());
        return redirect()->route('pelatihan.index')->with('updated','Data Pelatihan Berhasil Diubah');
    }

    public function show():View
    {
        $pelatihan= Pelatihan::all();
        return view('pelatihan.show')->with([
            "title"=>"Tampil Data Pelatihan",
            "data"=> $pelatihan
        ]);
    }
}
