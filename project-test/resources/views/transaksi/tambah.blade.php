@extends('layout.master')
@section('judul')
Halaman Tambah Transaksi
@endsection

@section('content')
<form action="/transaksi" method="POST">
    @csrf
    <div class="form-group">
      <label>Jenis Rekening</label>
      <select name="id_rekening" class="form-control" id="">
        <option value="">--Pilih Jenis Rekening--</option>
      @forelse ($rekening as $item)
      <option value = "{{$item->id}}">{{$item->jenis_rekening}}</option>
        
      @empty
        <option value="">Tidak ada Data Rekening</option>
      @endforelse
      </select>
    </div>
    <div class="form-group">
      <label>Tanggal setor</label>
      <input type="date" name="tanggal_setor" class="form-control">
    </div>
    @error('tanggal_setor')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Jumlah Setor</label>
      <input type="number" name="jumlah_setor" class="form-control">
    </div>
    @error('jumlah_setor')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection