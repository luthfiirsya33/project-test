@extends('layout.master')
@section('judul')
Halaman Edit Target
@endsection

@section('content')
<form action="/target/{{$target -> id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Jenis Rekening</label>
      <select name="id_rekening" class="form-control" id="">
      <option value="">--Pilih Jenins Rekening--</option>
      @forelse ($rekening as $item )
        @if ($item->id === $target->id_rekening)
          <option value="{{$item->id}}" selected> {{$item->jenis_rekening}}</option>

        @else
        <option value="{{$item->id}}">{{$item->jenis_rekening}}</option>

        @endif
        
      @empty
        
      <option value="">Tidak Data Rekening</option>
      @endforelse
    </select>
    </div>
    @error('jumlah_target')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

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