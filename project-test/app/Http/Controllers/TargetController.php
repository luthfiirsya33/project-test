<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use App\Models\Target;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $target = Target::with('rekening')->get();
        return view('target.tampil',compact('target'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekening= DB::table('rekening')->get();
        return view("target.tambah", compact('rekening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_rekening' => 'required',
            'tahun' => 'required',
            'jumlah_target' => 'required'
        ]);

        
        Target::create([
            'id_rekening'=>$request->id_rekening,
            'tahun'=>$request->tahun,
            'jumlah_target'=>$request->jumlah_target
        ]);
        


        return redirect('/target');
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
        $target = Target::find($id);
        $rekening = Rekening::get();
        return view('target.edit', ['target'=>$target, 'rekening'=>$rekening]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_rekening' => 'required',
            'tahun' => 'required',
            'jumlah_target' => 'required'
        ]);

        $target = Target::find($id);
        $target->tahun=$request['tahun'];
        $target->jumlah_target=$request['jumlah_target'];
        $target->id_rekening=$request['id_rekening'];
        $target->save();

        return redirect('/target');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('target')->where('id', $id)->delete();
        return redirect('/target')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak()
    {
        $target = Target::with('rekening')->get();
        return view('target.cetak', compact('target'));
    }
}
