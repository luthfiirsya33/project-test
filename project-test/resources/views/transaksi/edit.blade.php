@extends('layout.master')
@section('judul')
Halaman Edit Transaksi
@endsection

@section('content')
<form action="/transaksi/{{$transaksi -> id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Jenis Rekening</label>
      <select name="id_rekening" class="form-control" id="">
      <option value="">--Pilih Jenis Rekening--</option>
      @forelse ($rekening as $item )
        @if ($item->id === $transaksi->id_rekening)
          <option value="{{$item->id}}" selected> {{$item->jenis_rekening}}</option>

        @else
        <option value="{{$item->id}}">{{$item->jenis_rekening}}</option>

        @endif
        
      @empty
        
      <option value="">Tidak Data Rekening</option>
      @endforelse
    </select>
    </div>
    @error('jenis_rekening')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    <div class="form-group">
      <label>Tanggal Setor</label>
      <input type="number" name="tanggal_setor" value="{{$transaksi->tanggal_setor}}" class="form-control">
    </div>
    @error('tanggal_setor')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
      <label>Jumlah setor</label>
      <input type="number" name="jumlah_setor" value="{{$transaksi->jumlah_setor}}" class="form-control">
    </div>
    @error('jumlah_setor')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection