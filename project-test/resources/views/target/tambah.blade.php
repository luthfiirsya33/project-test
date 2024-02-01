@extends('layout.master')
@section('judul')
Halaman Tambah Target
@endsection

@section('content')
<form action="/target" method="POST">
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
      <label>Tahun</label>
      <input type="number" name="tahun" class="form-control">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Jumlah Anggaran</label>
      <input type="number" name="jumlah_target" class="form-control">
    </div>
    @error('jumlah_target')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection