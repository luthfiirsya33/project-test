@extends('layout.master')
@section('judul')
Halaman List Transaksi
@endsection

@push('scripts')
<script>$(document).ready( function () {
  $('#myTable').DataTable();
});</script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
@endpush

@push('styles')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
@endpush
@section('content')

<a href="/transaksi/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
<a href="/cetakTransaksi" target="_blank" class="btn btn-success btn-sm mb-3">Cetak</a>

<table class="table" id='myTable'>
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jenis Rekening</th>
        <th scope="col">Sub Rekening</th>
        <th scope="col">Nama Rekening</th>
        <th scope="col">Tanggal Setor</th>
        <th scope="col">Jumlah Setor (Rp)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($transaksi as $key => $value )
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->rekening->jenis_rekening}}</td>
                <td>{{$value->rekening->sub_rekening}}</td>
                <td>{{$value->rekening->nama_rekening}}</td>
                <td>{{$value->tanggal_setor}}</td>
                <td>{{$value->jumlah_setor}}</td>
                    <td class="d-flex justify-content-center" >
                    <a href="/transaksi/{{$value -> id}}/edit" class="btn btn-info btn-sm my-1 mx-1">Edit</a>
                    <form action="/transaksi/{{$value -> id}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger btn-block btn-sm my-1 mx-1" value='Delete'>
                    </form>
                </td>
            </tr>
            
        @empty
        <tr>
            <td>Tidak ada Data</td>
        </tr>
            
        @endforelse
    </tbody>
  </table>
@endsection