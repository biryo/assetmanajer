<?php
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=Laporan Penjualan Asset.xls");
    header("Cache-Control: max-age=0");
    ?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Cetak Laporan</title>
    </head>
    <body>
        <header>
            <center><h1>Laporan Penjualan Asset</h1></center>
            <hr>
        </header>
<h3>Periode :<?=  "$startDate - $endDate" ;?></h3>
<table border="1">
    <thead>
        <tr>
            <td>#</td>
            <td>Tanggal Penjualan</td>
            <td>Status Penjualan</td>
            <td>Nama</td>
            <td>Seri</td>
            <td>Jenis</td>
            <td>Merk</td>
            <td>Tipe</td>
            <td>Speksifikasi</td>
            <td>Nilai</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        for ($i=0; $i < count($data); $i++) { ?> 
            <tr>
                <td><?=$no++?></td>
                <td><?=$data[$i]["tgl_penjualan"]?></td>
                <td><?=$data[$i]["status_penjualan"]?></td>
                <td><?=$data[$i]["nama_asset"]?></td>
                <td><?=$data[$i]["no_seri_asset"]?></td>
                <td><?=$data[$i]["jenis_asset"]?></td>
                <td><?=$data[$i]["merk_asset"]?></td>
                <td><?=$data[$i]["type_asset"]?></td>
                <td><?=$data[$i]["spek_asset"]?></td>
                <td>Rp.<?=$this->currency($data[$i]["nilai_asset"])?>,-</td>
            </tr>
            <?php } ?>
    </tbody>
</table>
</body>
</html>