@extends('layout.master')
@section('judul')
Halaman Tambah Targer
@endsection

@section('content')
<form action="/target" method="POST">
    @csrf
    <div class="form-group">
      <label>Tahun</label>
      <input type="number" name="tahun" class="form-control">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Jumlah Anggaran</label>
      <input type="number" name="jumlah_anggaran" class="form-control">
    </div>
    @error('jumlah_anggaran')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection