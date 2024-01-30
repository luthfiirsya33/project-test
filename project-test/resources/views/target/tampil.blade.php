@extends('layout.master')
@section('judul')
Halaman List Target
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

<a href="/target/create" class="btn btn-primary btn-sm mb-3">Tambah</a>

<table class="table" id='myTable'>
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jenis Rekening</th>
        <th scope="col">Sub Rekening</th>
        <th scope="col">Nama Rekening</th>
        <th scope="col">Tahun Anggaran</th>
        <th scope="col">Target (Rp)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($target as $key => $value )
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    @foreach ($value->rekening as $rekening)
                        {{$value->jenis_rekening}}
                        {{$value->sub_rekening}}
                        {{$value->nama_rekening}}
                     @endforeach
                </td>
                <td>{{$target->tahun}}</td>
                <td>{{$target->jumlah_target}}</td>
                    <td class="d-flex justify-content-center" >
                    <a href="/target/{{$value -> id}}/edit" class="btn btn-info btn-sm my-1 mx-1">Edit</a>
                    <form action="/target/{{$value -> id}}" method="POST">
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