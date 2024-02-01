<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = DB::table('rekening')->get();
        return view('rekening.tampil', ['rekening' => $rekening]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("rekening.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_rekening' => 'required',
            'sub_rekening' => 'required',
            'nama_rekening' => 'required'
        ]);

        DB::table('rekening')->insert([
            'jenis_rekening' => $request['jenis_rekening'],
            'sub_rekening' => $request['sub_rekening'],
            'nama_rekening' => $request['nama_rekening']
        ]);

        return redirect('/rekening');
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
        $rekening = DB::table('rekening')->where('id', $id)->first();
        return view('rekening.edit', ['rekening' => $rekening]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_rekening' => 'required',
            'sub_rekening' => 'required',
            'nama_rekening' => 'required'
        ]);

        DB::table('rekening')
            ->where('id', $id)
            ->update(
                    ['jenis_rekening' => $request -> jenis_rekening,
                    'sub_rekening' => $request -> sub_rekening,
                    'nama_rekening' => $request -> nama_rekening
                ]);
            return redirect('/rekening');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('rekening')->where('id', $id)->delete();
        return redirect('/rekening')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak()
    {
        $rekening = DB::table('rekening')->get();
        return view('rekening.cetak', ['rekening' => $rekening]);
    }
}
