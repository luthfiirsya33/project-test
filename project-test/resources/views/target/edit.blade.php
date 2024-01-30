@extends('layout.master')
@section('judul')
Halaman Edit Target
@endsection

@section('content')
<form action="/target/{{$target -> id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Tahun</label>
      <input type="number" name="tahun" value="{{$target->tahun}}" class="form-control">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Jumlah Target</label>
      <input type="number" name="jumlah_target" value="{{$target->jumlah_target}}" class="form-control">
    </div>
    @error('jumlah_target')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection