<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PesertaController extends Controller
{
    public function index()
    {
        return view('peserta.tabel', [
            "title" => 'Peserta', 
            "data" => Peserta::all()
        ]);
    }

    public function create():View
    {
        return view('peserta.tambah')->with(["title"=> "Tambah Data Peserta"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required",
            "nama_usaha"=>"required",
            "nohp"=>"required"
        ]);
        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success','Data Peserta Berhasil Ditambahkan');
    }

    public function edit(string $id):View
    {
        $peserta=Peserta::findOrFail($id);
        // dd($peserta);
        return view('peserta.edit',compact('peserta'))->with(["title"=>"Ubah Data
        Peserta"]);
    }

    public function update(Peserta $peserta, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=> "required",
            "email"=>"required",
            "nama_usaha"=>"required",
            "nohp"=>"nohp"
        ]);
        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('updated','Data Peserta Berhasil Diubah');
    }

    public function destroy($id):RedirectResponse
    {
        Peserta::where('id',$id)->delete();
        return redirect()->route('peserta.index')->with('deleted','Data Peserta Berhasil Dihapus');
    }

    // public function show(Peserta $peserta):View
    // {
    //     return view('peserta.tampil', compact('peserta'))
    //     ->with(["title"=> "Data Peserta"]);
    // }
}

