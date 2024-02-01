<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('rekening')->get();
        return view('transaksi.tampil',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekening= DB::table('rekening')->get();
        return view("transaksi.tambah", compact('rekening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_rekening' => 'required',
            'tanggal_setor' => 'required',
            'jumlah_setor' => 'required'
        ]);

        
        Transaksi::create([
            'id_rekening'=>$request->id_rekening,
            'tanggal_setor'=>$request->tanggal_setor,
            'jumlah_setor'=>$request->jumlah_setor
        ]);
        


        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        $rekening = Rekening::get();
        return view('transaksi.edit', ['transaksi'=>$transaksi, 'rekening'=>$rekening]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_rekening' => 'required',
            'tanggal_setor' => 'required',
            'jumlah_setor' => 'required'
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->tanggal_setor=$request['tanggal_setor'];
        $transaksi->jumlah_setor=$request['jumlah_setor'];
        $transaksi->id_rekening=$request['id_rekening'];
        $transaksi->save();

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('transaksi')->where('id', $id)->delete();
        return redirect('/transaksi')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak()
    {
        $transaksi = Transaksi::with('rekening')->get();
        return view('transaksi.cetak', compact('transaksi'));
    }

}
