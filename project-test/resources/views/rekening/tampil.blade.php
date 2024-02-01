@extends('layout.master')
@section('judul')
Halaman List Rekening
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

<a href="/rekening/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
<a href="/cetakRekening" target="_blank" class="btn btn-success btn-sm mb-3">Cetak</a>

<table class="table" id='myTable'>
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jenis Rekening</th>
        <th scope="col">Sub Rekening</th>
        <th scope="col">Nama Rekening</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($rekening as $key => $value )
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->jenis_rekening}}</td>
                <td>{{$value->sub_rekening}}</td>
                <td>{{$value->nama_rekening}}</td>
                    <td class="d-flex justify-content-center" >
                    <a href="/rekening/{{$value -> id}}/edit" class="btn btn-info btn-sm my-1 mx-1">Edit</a>
                    <form action="/rekening/{{$value -> id}}" method="POST">
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