@extends('layout.master')
@section('judul')
Halaman Tambah Rekening
@endsection

@section('content')
<form action="/rekening" method="POST">
    @csrf
    <div class="form-group">
      <label>Jenis Rekening</label>
      <input type="number" name="jenis_rekening" class="form-control">
    </div>
    @error('jenis_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Sub Rekening</label>
      <input type="number" name="sub_rekening" class="form-control">
    </div>
    @error('sub_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
        <label>Nama Rekening</label>
        <input type="text" name="nama_rekening" class="form-control">
      </div>
      @error('nama_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection