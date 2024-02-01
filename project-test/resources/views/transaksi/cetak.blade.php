<!DOCTYPE html>
<html>
<head>
<title>Cetak Tabel Transaksi</title>
</head>

<body>
<div class='form-group'>
    <p align="center"><b>DAFTAR TRANSAKSI</b></p>
    <p align="center"><b>PER TANGGAL:...........S/D.............</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 60%">
    <tr style="background-color: lightgray;">
        <th scope="col" ><b>No</b></th>
        <th scope="col" ><b>Kode Rekening</b></th>
        <th scope="col" ><b>Nama Rekening</b></th>
        <th scope="col" ><b>Tanggal Setor</b></th>
        <th scope="col" ><b>Jumlah Setor (Rp)</b></th>
    </tr>
    @foreach ($transaksi as $item)
    <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->rekening->jenis_rekening}}.{{$item->rekening->sub_rekening}}</td>
            <td>{{$item->rekening->nama_rekening}}</td>
            <td>{{$item->tanggal_setor}}</td>
            <td>{{$item->jumlah_setor}}</td>
    </tr>
        
    @endforeach
    </table>
</div>
<script type="text/javascript">
window.print()
</script>
</body>

</html>