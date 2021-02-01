<?php
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=Laporan Asset Gudang.xls");
    header("Cache-Control: max-age=0");
    ?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Cetak Laporan</title>
    </head>
    <body>
        <header>
            <center><h1>Laporan Asset Gudang</h1></center>
            <hr>
        </header>
<h3>Periode : <?= "{$tglawal} Sampai {$tglakhir}" ?></h3>
<table border="1">
    <?= $table_gdg ?>
</table>
</body>
</html>