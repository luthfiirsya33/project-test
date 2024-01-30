<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    public function create()
    {
        return view("target.tambah");
    }
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'jumlah_target' => 'required'
        ]);

        DB::table('target')->insert([
            'tahun' => $request['tahun'],
            'jumlah_target' => $request['jumlah_target']
        ]);

        return redirect('/target');
    }
    public function index()
    {
        $target = DB::table('target')->get();
        return view('target.tampil', ['target' => $target]);
    }

    public function edit($id)
    {
        $target = DB::table('target')->where('id', $id)->first();
        return view('target.edit', ['target' => $target]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'tahun' => 'required',
            'jumlah_target' => 'required'
        ]);

        DB::table('target')
            ->where('id', $id)
            ->update(
                    ['tahun' => $request -> tahun,
                    'jumlah_target' => $request -> jumlah_target
                ]);
            return redirect('/target');
    }
    public function destroy($id){
        DB::table('target')->where('id', $id)->delete();
        return redirect('/target')->with('success', 'Data Berhasil Dihapus!');
    }
}
