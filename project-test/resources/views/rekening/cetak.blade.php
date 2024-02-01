<!DOCTYPE html>
<html>
<head>
<title>Cetak Tabel Rekening</title>
</head>

<body>
<div class='form-group'>
    <p align="center"><b>TABEL REKENING</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 60%">
    <tr style="background-color: lightgray;">
        <th scope="col" rowspan="2"><b>No</b>No</th>
        <th scope="col" colspan="2"><b>Kode Rekening</b></th>
        <th scope="col" rowspan="2"><b>Nama Rekening</b></th>
    </tr>
    <tr style="background-color: lightgray;">
        <th scope="col"><b>Jenis Rekening</b></th>
        <th scope="col"><b>Sub Rekening</b></th>
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