<?php
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=Laporan Perbaikan Asset.xls");
    header("Cache-Control: max-age=0");
    ?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Cetak Laporan</title>
    </head>
    <body>
        <header>
            <center><h1>Laporan Perbaikan Asset</h1></center>
            <hr>
        </header>
<h3>Periode : <?= "{$tglawal} Sampai {$tglakhir}" ?></h3>
<table border="1">
    <?= $table_main ?>
</table>
</body>
</html>