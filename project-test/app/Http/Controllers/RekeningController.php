<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    public function create()
    {
        return view("rekening.tambah");
    }
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
    public function index()
    {
        $rekening = DB::table('rekening')->get();
        return view('rekening.tampil', ['rekening' => $rekening]);
    }

    public function cetak()
    {
        $rekening = DB::table('rekening')->get();
        return view('rekening.cetak', ['rekening' => $rekening]);
    }

    public function edit($id)
    {
        $rekening = DB::table('rekening')->where('id', $id)->first();
        return view('rekening.edit', ['rekening' => $rekening]);
    }

    public function update(Request $request, $id){

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
    public function destroy($id){
        DB::table('rekening')->where('id', $id)->delete();
        return redirect('/rekening')->with('success', 'Data Berhasil Dihapus!');
    }

}
