<!DOCTYPE html>
<html>
<head>
<title>Cetak Tabel Rekening</title>
</head>

<body>
<div class='form-group'>
    <p align="center"><b>Laporan Data Rekening</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 85%">
    <tr>
        <th scope="col" rowspan="2">No</th>
        <th scope="col" colspan="2">Kode Rekening</th>
        <th scope="col" rowspan="2">Nama Rekening</th>
    </tr>
    <tr>
        <th scope="col">Jenis Rekening</th>
        <th scope="col">Sub Rekening</th>
    </tr>
    @foreach ($rekening as $item)
    <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->jenis_rekening}}</td>
            <td>{{$item->sub_rekening}}</td>
            <td>{{$item->nama_rekening}}</td>
    </tr>
        
    @endforeach
    </table>
</div>
<script type="text/javascript">
window.print()
</script>
</body>

</html>