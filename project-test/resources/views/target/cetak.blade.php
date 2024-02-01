<!DOCTYPE html>
<html>
<head>
<title>Cetak Tabel Target</title>
</head>

<body>
<div class='form-group'>
    <p align="center"><b>TABEL TARGET ANGGARAN TAHUN:</b></p>
    <p align="center"><b>...........</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 60%">
    <tr style="background-color: lightgray;">
        <th scope="col" rowspan="2"><b>No</b></th>
        <th scope="col" colspan="2"><b>Kode Rekening</b></th>
        <th scope="col" rowspan="2"><b>Nama Rekening</b></th>
        <th scope="col" rowspan="2"><b>Tahun Anggaran</b></th>
        <th scope="col" rowspan="2"><b>Target (Rp)</b></th>
    </tr>
    <tr style="background-color: lightgray;">
        <th scope="col">Jenis Rekening</th>
        <th scope="col">Sub Rekening</th>
    </tr>
    @foreach ($target as $item)
    <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->rekening->jenis_rekening}}</td>
            <td>{{$item->rekening->sub_rekening}}</td>
            <td>{{$item->rekening->nama_rekening}}</td>
            <td>{{$item->tahun}}</td>
            <td>{{$item->jumlah_target}}</td>
    </tr>
        
    @endforeach
    </table>
</div>
<script type="text/javascript">
window.print()
</script>
</body>

</html>