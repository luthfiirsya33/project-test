@extends('layout.master')
@section('judul')
Halaman Edit Rekening
@endsection

@section('content')
<form action="/rekening/{{$rekening -> id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Jenis Rekening</label>
      <input type="number" name="jenis_rekening" value="{{$rekening->jenis_rekening}}" class="form-control">
    </div>
    @error('jenis_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Sub Rekening</label>
      <input type="number" name="sub_rekening" value="{{$rekening->sub_rekening}}" class="form-control">
    </div>
    @error('sub_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
        <label>Nama Rekening</label>
        <input type="text" name="nama_rekening" value="{{$rekening->nama_rekening}}" class="form-control">
      </div>
      @error('nama_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection