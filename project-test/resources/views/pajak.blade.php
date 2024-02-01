<!DOCTYPE html>
<html>
<head>
<title>Cetak Tabel Pajak</title>
</head>

<body>
<div class='form-group'>
    <p align="center"><b>PENERIMAAN LAPORAN PAJAK</b></p>
    <p align="center"><b>TAHUN.........</b></p>
    <p align="center"><b>s/d Tanggal :.............</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 60%">
    <tr>
        <th scope="col" rowspan="2"><b>No</b></th>
        <th scope="col" rowspan="2"><b>Kode Rekening</b></th>
        <th scope="col" rowspan="2"><b>Nama Rekening</b></th>
        <th scope="col" rowspan="2"><b>Target (Rp)</b></th>
        <th scope="col" colspan="3"><b>Realisasi</b></th>
        <th scope="col" rowspan="2"><b>%</b></th>
    </tr>
    <tr>
        <th scope="col">s/d Bulan Lalu</th>
        <th scope="col">Bulan ini</th>
        <th scope="col">s/d Bulan ini</th>
    </tr>
    <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8 (7/4)</th>
    </tr>
    <?php 
    $no = 1;
    $con = mysqli_connect("localhost","root","","test");
    $query = "SELECT * FROM transaksi
                INNER JOIN `target` ON transaksi.id = target.id
                INNER JOIN rekening ON transaksi.id_rekening = rekening.id"
                ;
    $slq_pj = mysqli_query($con, $query) or die (mysqli_error($con));
    while($data = mysqli_fetch_array($slq_pj)){?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$data['jenis_rekening']?>.<?=$data['sub_rekening']?></td>
        <td><?=$data['nama_rekening']?></td>
        <td><?=$data['jumlah_target']?></td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
    <?php
}?>
<tr>
    <td colspan="3" align= "center">Total</td>
    <td><?php $result = mysqli_query($con, 'SELECT SUM(jumlah_target) AS value_sum FROM `target`'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum'];
        echo $sum;
        ?></td>
    <td> </td>
    <td> </td>
    <td> </td>
</tr>
    </table>
</div>
<script type="text/javascript">
window.print()
</script>
</body>
</html>