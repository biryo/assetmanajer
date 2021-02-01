<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
date_default_timezone_set("Asia/Jakarta");



//konkesi Datadase
class connection {

    public function open_connection() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "db_asment";
        $this->con = mysqli_connect($server, $user, $password, $database);
    }

}

//Pages Module
class controller {

    public function module($dompdf) {
        //Security Login
        $this->secure();
        //other
        $other = new other();
        //Account
        $acc = new account();
        $acc->account_info();
        //User
        $user = new user();
        //Asset
        $asset = new asset();
        //Penjualan
        $jual = new jual();
        //Peminjaman
        $pinjam = new pinjam();
        //Gudang
        $gudang = new gudang();
        //Peminjaman
        $maintenance = new maintenance();
        //Ajax
        $ajax = new ajax();
        //Report
        $report = new report();
        if ($this->page == "home") {
            $other->info_beranda();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/home.php";
            include "view/footer.php";
        } else if ($this->page == "login") {
            include "view/login.php";
        } else if ($this->page == "check_login") {
            $acc->check_login();
        } else if ($this->page == "logout") {
            $acc->logout();
        } else if ($this->page == "account") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/account.php";
            include "view/footer.php";
        } else if ($this->page == "search-account") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/search_account.php";
            include "view/footer.php";
        } else if ($this->page == "create-acc") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_acc.php";
            include "view/footer.php";
        } else if ($this->page == "save-acc") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            $acc->save_account();
            include "view/footer.php";
        } else if ($this->page == "edit-acc") {
            $acc->edit_account();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_acc.php";
            include "view/footer.php";
        } else if ($this->page == "update-acc") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            $acc->update_account();
            include "view/footer.php";
        } else if ($this->page == "delete-acc") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            $acc->delete_account();
            include "view/footer.php";
        } else if ($this->page == "user") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/user.php";
            include "view/footer.php";
        } else if ($this->page == "create-user") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_user.php";
            include "view/footer.php";
        } else if ($this->page == "edit-user") {
            $user->info_user();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_user.php";
            include "view/footer.php";
        } else if ($this->page == "save-user") {
            $user->save_user();
        } else if ($this->page == "update-user") {
            $user->update_user();
        } else if ($this->page == "delete-user") {
            $user->delete_user();
        } else if ($this->page == "asset") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/asset.php";
            include "view/footer.php";
        } else if ($this->page == "create-asset") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_asset.php";
            include "view/footer.php";
        } else if ($this->page == "edit-asset") {
            $asset->info_asset();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_asset.php";
            include "view/footer.php";
        } else if ($this->page == "save-asset") {
            $asset->save_asset();
        } else if ($this->page == "update-asset") {
            $asset->update_asset();
        } else if ($this->page == "delete-asset") {
            $asset->delete_asset();
        } else if ($this->page == "penjualan") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/penjualan.php";
            include "view/footer.php";
        } else if ($this->page == "create-penjualan") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_penjualan.php";
            include "view/footer.php";
        } else if ($this->page == "edit-penjualan") {
            $jual->info_jual();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_penjualan.php";
            include "view/footer.php";
        } else if ($this->page == "laporan") {

            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/laporan.php";
            include "view/footer.php";

        } else if ($this->page == "list-asset") {
            $ajax->list_asset();
        } else if ($this->page == "get-data-asset") {
            $ajax->get_data_asset();
        } else if ($this->page == "save-penjualan") {
            $jual->save_jual();
        } else if ($this->page == "update-penjualan") {
            $jual->update_jual();
        } else if ($this->page == "delete-penjualan") {
            $jual->delete_jual();
        } else if ($this->page == "peminjaman") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/peminjaman.php";
            include "view/footer.php";
        } else if ($this->page == "create-peminjaman") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_peminjaman.php";
            include "view/footer.php";
        } else if ($this->page == "edit-peminjaman") {
            $pinjam->info_pinjam();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_peminjaman.php";
            include "view/footer.php";
        } else if ($this->page == "list-user") {
            $ajax->list_user();
        } else if ($this->page == "get-data-user") {
            $ajax->get_data_user();
        } else if ($this->page == "save-peminjaman") {
            $pinjam->save_pinjam();
        } else if ($this->page == "update-peminjaman") {
            $pinjam->update_pinjam();
        } else if ($this->page == "delete-peminjaman") {
            $pinjam->delete_pinjam();
        } else if ($this->page == "gudang") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/gudang.php";
            include "view/footer.php";
        } else if ($this->page == "create-gudang") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_gudang.php";
            include "view/footer.php";
        } else if ($this->page == "edit-gudang") {
            $gudang->info_gudang();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_gudang.php";
            include "view/footer.php";
        } else if ($this->page == "save-gudang") {
            $gudang->save_gudang();
        } else if ($this->page == "get-data-gudang") {
            $ajax->get_data_gudang();
        } else if ($this->page == "update-gudang") {
            $gudang->update_gudang();
        } else if ($this->page == "delete-gudang") {
            $gudang->delete_gudang();
        } else if ($this->page == "maintenance") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/maintenance.php";
            include "view/footer.php";
        } else if ($this->page == "create-maintenance") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/create_maintenance.php";
            include "view/footer.php";
        } else if ($this->page == "edit-maintenance") {
            $maintenance->info_maintenance();
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/edit_maintenance.php";
            include "view/footer.php";
        } else if ($this->page == "save-maintenance") {
            $maintenance->save_maintenance();
        } else if ($this->page == "get-data-maintenance") {
            $ajax->get_data_maintenance();
        } else if ($this->page == "update-maintenance") {
            $maintenance->update_maintenance();
        } else if ($this->page == "delete-maintenance") {
            $maintenance->delete_maintenance();
        } else if ($this->page == "depresiasi") {
            include "view/head.php";
            include "view/header.php";
            include "view/leftnav.php";
            include "view/depresiasi.php";
            include "view/footer.php";
        } else if ($this->page == "calculate-depresiasi") {
            $ajax->depresiasi();
        } else if ($this->page == "calculate-depresiasi-jual") {
            $ajax->depresiasi_jual();
        } else if ($this->page == "data_gdg") {
            $gudang->lap_gudang();
        } else if ($this->page == "view_pdf_gdg") {
              
              $html ="<!DOCTYPE html>
                        <html>
                        <head>
                            <title>Cetak Laporan</title>
                        </head>
                        <style type='text/css'>
                        table,td,th{
                            border:1px solid black;
                            border-collapse:collapse;
                            text-align:center;
                        }
                        thead tr td{
                            background-color: blue;
                            color: white;
                        }
                        tr:nth-child(odd){
                            background-color: lightblue;
                        }
                        </style>
                        <body>
                            <header>
                                <center><h1>Laporan Asset Gudang</h1></center>
                                <hr>
                            </header>";
            $html .= "<h3>Periode : {$_POST['tglawal']} Sampai {$_POST['tglakhir']}</h3>";
            $html .= "<img src='".$_POST['chartpie_gdg']."' width='700'></img>";
            $html .="<br><h2>List Asset :<h2><table>";
            $html .= $_POST['data_gdg'];            
            $html .= "</table></body></html>";

            $dompdf->loadHtml($html);
            // Setting ukuran dan orientasi kertas
            $dompdf->setPaper('A4', 'potrait');
            // Rendering dari HTML Ke PDF
            $dompdf->render();
            // Melakukan output file Pdf
            ob_end_clean();
            $dompdf->stream('Laporan Gudang.pdf', array("Attachment" => false));

        } else if ($this->page == "view_xcel_gdg") {
            $table_gdg = $_POST['data_gdg'];
            $Jns_Label = $_POST['dataJns'];
            $Jns_Value = $_POST['dataJns2'];
            $tglawal = $_POST['tglawal'];
            $tglakhir = $_POST['tglakhir'];
            include "view/lap_gdg_excel.php";
        } else if ($this->page == "data_main") {
            $maintenance->lap_maintenance();
        } else if ($this->page == "view_pdf_main") {
              $html ="<!DOCTYPE html>
                        <html>
                        <head>
                            <title>Cetak Laporan</title>
                        </head>
                        <style type='text/css'>
                        table,td,th{
                            border:1px solid black;
                            border-collapse:collapse;
                            text-align:center;
                        }
                        thead tr td{
                            background-color: blue;
                            color: white;
                        }
                        tr:nth-child(odd){
                            background-color: lightblue;
                        }
                        </style>
                        <body>
                            <header>
                                <center><h1>Laporan Perbaikan Asset</h1></center>
                                <hr>
                            </header>";
            $html .= "<h3>Periode : {$_POST['tglawal']} Sampai {$_POST['tglakhir']}</h3>";
            $html .="<br><h2>Daftar Asset Yang Diperbaiki :<h2><table>";
            $html .= $_POST['data_main'];            
            $html .= "</table></body></html>";

            $dompdf->loadHtml($html);
            // Setting ukuran dan orientasi kertas
            $dompdf->setPaper('A4', 'potrait');
            // Rendering dari HTML Ke PDF
            $dompdf->render();
            // Melakukan output file Pdf
            ob_end_clean();
            $dompdf->stream('Laporan Perbaikan.pdf', array("Attachment" => false));
        } else if ($this->page == "view_xcel_main") {
            $table_main = $_POST['data_main'];
            $tglawal = $_POST['tglawal'];
            $tglakhir = $_POST['tglakhir'];
            include "view/lap_main_excel.php";
        } else if ($this->page == "data_pinjam") {
            $pinjam->lap_pinjam();
        } else if ($this->page == "view_pdf_res") {
              $html ="<!DOCTYPE html>
                        <html>
                        <head>
                            <title>Cetak Laporan</title>
                        </head>
                        <style type='text/css'>
                        table,td,th{
                            border:1px solid black;
                            border-collapse:collapse;
                            text-align:center;
                        }
                        thead tr td{
                            background-color: blue;
                            color: white;
                        }
                        tr:nth-child(odd){
                            background-color: lightblue;
                        }
                        </style>
                        <body>
                            <header>
                                <center><h1>Laporan Peminjaman Asset</h1></center>
                                <hr>
                            </header>";
            $html .= "<h3>Periode : {$_POST['tglawal']} Sampai {$_POST['tglakhir']}</h3>";
            $html .="<br><h2>Daftar Peminjam Asset :<h2><table>";
            $html .= $_POST['data_res'];            
            $html .= "</table></body></html>";

            $dompdf->loadHtml($html);
            // Setting ukuran dan orientasi kertas
            $dompdf->setPaper('A4', 'potrait');
            // Rendering dari HTML Ke PDF
            $dompdf->render();
            // Melakukan output file Pdf
            ob_end_clean();
            $dompdf->stream('Laporan Peminjam.pdf', array("Attachment" => false));
        } else if ($this->page == "view_xcel_res") {
            $table_res = $_POST['data_res'];
            $tglawal = $_POST['tglawal'];
            $tglakhir = $_POST['tglakhir'];
            include "view/lap_res_excel.php";
        } else if ($this->page == "lap_dep") {
            $ajax->lap_dep();
        } else if ($this->page == "lap_dep_pdf") {
            $tglakhir = $_POST['tgltutup'];
            $html ="<!DOCTYPE html>
                        <html>
                        <head>
                            <title>Cetak Laporan</title>
                        </head>
                        <style type='text/css'>
                        table,td,th{
                            border:1px solid black;
                            border-collapse:collapse;
                            text-align:center;
                        }
                        thead tr td{
                            background-color: blue;
                            color: white;
                        }
                        tr:nth-child(odd){
                            background-color: lightblue;
                        }
                        </style>
                        <body>
                            <header>
                                <center><h1>Laporan Depresiasi Asset</h1></center>
                                <hr>
                            </header>";
            $html .= "<h3>Periode : $tglakhir </h3>";
            $html .="<br><h2>List Asset :<h2><table>";
            $html .= $_POST['datadep'];            
            $html .= "</table></body></html>";

            $dompdf->loadHtml($html);
            // Setting ukuran dan orientasi kertas
            $dompdf->setPaper('A4', 'potrait');
            // Rendering dari HTML Ke PDF
            $dompdf->render();
            // Melakukan output file Pdf
            ob_end_clean();
            $dompdf->stream('Laporan Depresiasi Asset.pdf', array("Attachment" => false));
        } else if ($this->page == "lap_dep_excel") {
            $table = $_POST['datadeps'];
            $tglakhir = $_POST['tgltutup'];
            include "view/lap_dep_excel.php";
        } else if ($this->page == "view-laporan") {
            $report->penjualan_report();
        } else if ($this->page == "lap_sell_excel") {
            $data = $report->penjualan_report();
            $stts = $_POST['stts'];
            $chartpie = $_POST['chartpie'];
            $chartgraph = $_POST['chartgraph'];
            $startDate = $_POST['startdate'];
            $endDate = $_POST['enddate'];
            include "view/lap_sell_excel.php";
        } else if ($this->page == "lap_sell_pdf") {
            $data = $report->penjualan_report();
 
            $stts = $_POST['stts'];
            $chartpie = $_POST['chartpie'];
            $chartgraph = $_POST['chartgraph'];
            $startDate = $_POST['startdate'];
            $endDate = $_POST['enddate'];

            $html =    "<!DOCTYPE html>
                        <html>
                        <head>
                            <title>Cetak Laporan</title>
                        </head>
                        <style type='text/css'>
                        table,td,th{
                            border:1px solid black;
                            border-collapse:collapse;
                            text-align:center;
                        }
                        thead tr td{
                            background-color: blue;
                            color: white;
                        }
                        tr:nth-child(odd){
                            background-color: lightblue;
                        }
                        </style>
                        <body>
                            <header>
                                <center><h1>Laporan Penjualan Asset</h1></center>
                                <hr>
                            </header>";
            $html .= "<h3>Periode : ".$startDate." - ".$endDate."</h3>";
            $html .= "<br><img src='".$chartgraph."' width='700'></img><h3>Penjualan asset pada periode ".$startDate." - ".$endDate." terjual sebanyak ".count($data)." asset. Grafik Bar diatas menunjukkan tanggal asset yang terjual.</h3>";
            $html .= "<img src='".$chartpie."' width='700'></img><h3>Asset yang telah terjual dapat diliat melalui Grafik Donat diatas, Grafik di atas akan menunjukkan jumlah asset terbanyak yang terjual dengan di lelang atau tidak.</h3>";
            $html .="<br><h2>Detail Penjualan :<h2>";
            $html .= "<table><thead><tr>
                        <td>#</td>
                        <td>Tanggal Penjualan</td>
                        <td>Nama</td>
                        <td>Seri</td>
                        <td>Jenis</td>
                        <td>Merk</td>
                        <td>Tipe</td>
                        <td>Speksifikasi</td>
                        <td>Nilai</td>
                    </tr></thead><tbody>";
            $no = 1;
            for ($i=0; $i < count($data); $i++) { 
                $html .= '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$data[$i]["tgl_penjualan"].'</td>
                            <td>'.$data[$i]["nama_asset"].'</td>
                            <td>'.$data[$i]["no_seri_asset"].'</td>
                            <td>'.$data[$i]["jenis_asset"].'</td>
                            <td>'.$data[$i]["merk_asset"].'</td>
                            <td>'.$data[$i]["type_asset"].'</td>
                            <td>'.$data[$i]["spek_asset"].'</td>
                            <td>Rp.'.$this->currency($data[$i]["nilai_asset"]).',-</td>
                        </tr>';
            }
            $html .= "</tbody></table>";
            $html .= "</body></html>";

            $dompdf->loadHtml($html);
            // Setting ukuran dan orientasi kertas
            $dompdf->setPaper('A4', 'potrait');
            // Rendering dari HTML Ke PDF
            $dompdf->render();
            // Melakukan output file Pdf
            ob_end_clean();
            $dompdf->stream('Laporan Penjualan.pdf', array("Attachment" => false));
        } else {
            include "view/404.php";
        }
    }

    public function secure() {
        if (!empty($_GET['page'])) {
            $this->page = $_GET['page'];
        } else {
            $this->page = "none";
        }
        if (!empty($_SESSION['kd_user']) and ! empty($_SESSION['level_user'])) {
            if ($this->page == "login") {
                $this->go("?page=home");
            } else if ($this->page == "none") {
                $this->go("?page=home");
            }
        } else {
            if ($this->page != "none") {
                if ($this->page != "check_login") {
                    if ($this->page != "login") {
                        $this->alert("Please Login To Continue ....", "?page=login");
                    }
                }
            } else {
                $this->alert("Please Login To Continue ....", "?page=login");
            }
        }
    }

    public function date($date, $format) {
        $cekdate = strlen($date);
        if ($cekdate > 10) {
            $cekdate = explode(" ", $date);
            $date = $cekdate[0];
        }
        $tgl = explode("-", $date);
        $d = $tgl[2];
        $m = $tgl[1];
        $y = $tgl[0];
        //Konversi Bulan
        if ($m == "01") {
            $this->bulan = "Januari";
            $this->bln = "Jan";
        } else if ($m == "02") {
            $this->bulan = "Februari";
            $this->bln = "Feb";
        } else if ($m == "03") {
            $this->bulan = "Maret";
            $this->bln = "Mar";
        } else if ($m == "04") {
            $this->bulan = "April";
            $this->bln = "Apr";
        } else if ($m == "05") {
            $this->bulan = "Mei";
            $this->bln = "Mei";
        } else if ($m == "06") {
            $this->bulan = "Juni";
            $this->bln = "Jun";
        } else if ($m == "07") {
            $this->bulan = "Juli";
            $this->bln = "Jul";
        } else if ($m == "08") {
            $this->bulan = "Agustus";
            $this->bln = "Ags";
        } else if ($m == "09") {
            $this->bulan = "September";
            $this->bln = "Sep";
        } else if ($m == "10") {
            $this->bulan = "Oktober";
            $this->bln = "Okt";
        } else if ($m == "11") {
            $this->bulan = "November";
            $this->bln = "Nov";
        } else {
            $this->bulan = "Desember";
            $this->bln = "Des";
        }
        //Format Tanggal
        if ($format == "indo") {
            $tanggal = $d . " " . $this->bln . " " . $y;
        } else if ($format == "indo2") {
            $tanggal = $d . " " . $this->bulan . " " . $y;
        }
        return $tanggal;
    }

    public function currency($nilai) {
        $this->nilai = $nilai;
        $currency = number_format($this->nilai, 0, ',', '.');
        return $currency;
    }

    public function strtoint($nilai) {
        $this->nilai = $nilai;
        $currency = preg_replace("/[.]/", "", $this->nilai);
        return $currency;
    }

    public function dafault_date($format, $type, $str) {
        if ($type == "/") {
            if ($format == "mm/dd/yyyy") {
                $getdate = explode("/", $str);
                $date = $getdate[2] . "-" . $getdate[0] . "-" . $getdate[1];
                return $date;
            } else if ($format == "dd/mm/yyyy") {
                
            }
        } else if ($type == "-") {
            if ($format == "mm-dd-yyyy") {
                $getdate = explode("-", $str);
                $date = $getdate[2] . "-" . $getdate[0] . "-" . $getdate[1];
                return $date;
            } else if ($format == "dd-mm-yyyy") {
                $getdate = explode("-", $str);
                $date = $getdate[2] . "-" . $getdate[1] . "-" . $getdate[0];
                return $date;
            }
        } else {
            echo "None";
        }
    }

    public function kode_otomatis($kode_name) {
        $this->kode_name = $kode_name;
        $con = new connection();
        $con->open_connection();
        if ($this->kode_name == "account") {
            $query = mysqli_query($con->con, "select * from account ORDER BY kd_acc DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_acc'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "ACC000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "ACC00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "ACC0" . $kode;
                } else {
                    $this->kode_otomatis = "ACC" . $kode;
                }
            } else {
                $this->kode_otomatis = "ACC0001";
            }
        } else if ($this->kode_name == "detail_account") {
            $query = mysqli_query($con->con, "select * from detail_account ORDER BY kd_dacc DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_dacc'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "DAC000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "DAC00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "DAC0" . $kode;
                } else {
                    $this->kode_otomatis = "DAC" . $kode;
                }
            } else {
                $this->kode_otomatis = "DAC0001";
            }
        } else if ($this->kode_name == "asset") {
            $query = mysqli_query($con->con, "select * from asset ORDER BY kd_asset DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_asset'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "AST000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "AST00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "AST0" . $kode;
                } else {
                    $this->kode_otomatis = "AST" . $kode;
                }
            } else {
                $this->kode_otomatis = "AST0001";
            }
        } else if ($this->kode_name == "penjualan") {
            $query = mysqli_query($con->con, "select * from penjualan ORDER BY kd_penjualan DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_penjualan'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "PJL000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "PJL00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "PJL0" . $kode;
                } else {
                    $this->kode_otomatis = "PJL" . $kode;
                }
            } else {
                $this->kode_otomatis = "PJL0001";
            }
        } else if ($this->kode_name == "pinjam") {
            $query = mysqli_query($con->con, "select * from pinjam ORDER BY kd_pinjam DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_pinjam'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "PJM000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "PJM00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "PJM0" . $kode;
                } else {
                    $this->kode_otomatis = "PJM" . $kode;
                }
            } else {
                $this->kode_otomatis = "PJM0001";
            }
        } else if ($this->kode_name == "gudang") {
            $query = mysqli_query($con->con, "select * from gudang ORDER BY kd_gudang DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_gudang'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "GDN000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "GDN00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "GDN0" . $kode;
                } else {
                    $this->kode_otomatis = "GDN" . $kode;
                }
            } else {
                $this->kode_otomatis = "GDN0001";
            }
        } else if ($this->kode_name == "maintenance") {
            $query = mysqli_query($con->con, "select * from maintenance ORDER BY kd_maintenance DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_maintenance'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "MTN000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "MTN00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "MTN0" . $kode;
                } else {
                    $this->kode_otomatis = "MTN" . $kode;
                }
            } else {
                $this->kode_otomatis = "MTN0001";
            }
        } else if ($this->kode_name == "file") {
            $query = mysqli_query($con->con, "select * from file ORDER BY kd_file DESC");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $kode = $row['kd_file'];
                $kode = substr($kode, 3, 4) + 1;
                if ($kode < 10) {
                    $this->kode_otomatis = "FLE000" . $kode;
                } else if ($kode < 100) {
                    $this->kode_otomatis = "FLE00" . $kode;
                } else if ($kode < 1000) {
                    $this->kode_otomatis = "FLE0" . $kode;
                } else {
                    $this->kode_otomatis = "FLE" . $kode;
                }
            } else {
                $this->kode_otomatis = "FLE0001";
            }
        } 
        return $this->kode_otomatis;
    }

    public function file($nama_file, $lokasi, $nama_baru) {
        if (!empty($nama_file)) {
            $ext = explode('.', basename($nama_file)); //untuk mengambil ekstensi file
            $nama_kirim = $nama_baru . date("YmdHis") . rand(10, 99) . "." . $ext[1];
            $this->ex = $ext[1];
            $this->dir = $lokasi . "/";
            $this->file = $nama_kirim;
        } else {
            $this->dir = 0;
            $this->file = 0;
        }
    }

    public function alert($pesan, $url) {
        if ($url == "none") {
            echo"<script>alert('$pesan');history.go(-1);</script>";
        } else {
            echo"<script>alert('$pesan');document.location.href='$url';</script>";
        }
    }

    public function go($url) {
        if ($url != "none") {
            echo"<script>document.location.href='$url';</script>";
        } else {
            echo"<script>alert('$pesan');history.go(-1);</script>";
        }
    }

    public function phone($tlp) {
        $strl = strlen($tlp);
        $str = substr($tlp, 0, 1);
        $str2 = substr($tlp, 0, 2);
        if ($str == 0) {
            $jump = $strl - 1;
            $no = substr($tlp, 1, $jump);
            return $no;
        } else if ($str2 == 62) {
            $jump = $strl - 2;
            $no = substr($tlp, 2, $jump);
            return $no;
        } else {
            return $tlp;
        }
    }

    public function datesql($date) {
        if (!empty($date)) {
            $date = explode("-", $date);
            $datefull = $date[2] . "-" . $date[1] . "-" . $date[0];
            return $datefull;
        } else {
            return "error";
        }
    }

    public function datetimenow() {
        return date("Y-m-d H:i:s");
    }

    public function datenow() {
        return date("Y-m-d");
    }

}

class account extends controller {

    public function account_info() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_SESSION['kd_user']) and ! empty($_SESSION['level_user'])) {
            $this->id = $_SESSION['kd_user'];
            $this->level = $_SESSION['level_user'];
            $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where account.kd_acc='$this->id'");
            $row = mysqli_fetch_array($query);
            $this->name = $row['fullname_dacc'];
            $this->email = $row['email_acc'];
            $this->tlp = $row['tlp_dacc'];
            $this->gender = $row['gender_dacc'];
            $this->address = $row['address_dacc'];
            $this->photo = $row['photo_dacc'];
        } else {
            $this->id = "none";
            $this->level = "none";
            $this->name = "none";
            $this->email = "none";
            $this->tlp = "none";
            $this->gender = "none";
            $this->address = "none";
            $this->photo = "none";
        }
    }

    public function logout() {
        session_destroy();
        $this->alert("Sign Out......", "?page=login");
    }

    public function check_login() {
        if (!empty($_POST['email']) and ! empty($_POST['pass'])) {
//Koneksi
            $con = new connection();
            $con->open_connection();
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $password = md5($pass);
            $query = mysqli_query($con->con, "select * from account where email_acc='$email' and pass_acc='$password'");
            $cek = mysqli_num_rows($query);
            if ($cek > 0) {
                $row = mysqli_fetch_array($query);
                $_SESSION['kd_user'] = $row['kd_acc'];
                $_SESSION['level_user'] = $row['level_acc'];
                $this->alert("Login Successfully.. Welcome..", "?page=home");
            } else {
                $this->alert("Wrong Password Or Email !! Please Try Again !!", "none");
            }
        } else {
            $this->alert("Please Input Username and Password first !!", "none");
        }
    }

    public function view_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc order by account.kd_acc ASC");
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {
            $i++;
            echo"<tr><td>$i</td><td>$row[email_acc]</td><td>$row[fullname_dacc]</td><td>$row[level_acc]</td><td><a href='?page=edit-acc&id=$row[kd_acc]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-acc&id=$row[kd_acc]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
        }
    }

    public function search_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where (`email_acc` LIKE '%" . $id . "%') OR (`level_acc` LIKE '%" . $id . "%') OR (`fullname_dacc` LIKE '%" . $id . "%') OR (`tlp_dacc` LIKE '%" . $id . "%') OR (`address_dacc` LIKE '%" . $id . "%') order by account.kd_acc ASC");
            $i = 0;
            while ($row = mysqli_fetch_array($query)) {
                $i++;
                echo"<tr><td>$i</td><td>$row[email_acc]</td><td>$row[fullname_dacc]</td><td>$row[level_acc]</td><td><a href='?page=edit-acc&id=$row[kd_acc]'>Edit</a> | <a href='?page=delete-acc&id=$row[kd_acc]'>Delete</a></td></tr>";
            }
        } else {
            $this->alert("Something wrong !!", "?page=home");
        }
    }

    public function hint_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        $key = strtolower($_GET['key']);
        $array = array();
        $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where (`fullname_dacc` LIKE '%" . $key . "%') OR (`tlp_dacc` LIKE '%" . $key . "%') OR (`address_dacc` LIKE '%" . $key . "%') OR (`email_acc` LIKE '%" . $key . "%') OR (`level_acc` LIKE '%" . $key . "%')");
        while ($row = mysqli_fetch_assoc($query)) {
            if (strpos(strtolower($row['fullname_dacc']), $key) !== false) {
                $array[] = $row['fullname_dacc'];
            } if (strpos(strtolower($row['tlp_dacc']), $key) !== false) {
                $array[] = $row['tlp_dacc'];
            } if (strpos(strtolower($row['address_dacc']), $key) !== false) {
                $array[] = $row['address_dacc'];
            } if (strpos(strtolower($row['email_acc']), $key) !== false) {
                $array[] = $row['email_acc'];
            } if (strpos(strtolower($row['level_acc']), $key) !== false) {
                $array[] = $row['level_acc'];
            }
        }
        echo json_encode($array);
    }

    public function delete_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $cek = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where account.kd_acc='$id'");
            $row = mysqli_fetch_array($cek);
            $loc = $row['photo_dacc'];
            if ($loc == "asset/img/avatar/defphoto.jpg") {
                $del = mysqli_query($con->con, "delete from account where kd_acc='$id'");
                if ($del) {
                    $this->alert("Account With ID $id Has Been Deleted", "?page=account");
                } else {
                    $this->alert("Failed To Delete Account !!", "none");
                }
            } else {
                $rmv = unlink($loc);
                if ($rmv) {
                    $del = mysqli_query($con->con, "delete from account where kd_acc='$id'");
                    if ($del) {
                        $this->alert("Account With ID $id Has Been Deleted", "?page=account");
                    } else {
                        $this->alert("Failed To Delete Account !!", "none");
                    }
                } else {
                    $this->alert("Can't Remove Image On Storage.... ", "?page=account");
                }
            }
        } else {
            $this->alert("Something wrong !!", "?page=home");
        }
    }

    public function edit_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where account.kd_acc='$id'");
            $row = mysqli_fetch_array($query);
            $this->kd_acc = $row['kd_acc'];
            $this->email_acc = $row['email_acc'];
            $this->level_acc = $row['level_acc'];
            $this->kd_dacc = $row['kd_dacc'];
            $this->fullname_dacc = $row['fullname_dacc'];
            $this->gender_dacc = $row['gender_dacc'];
            $this->tlp_dacc = $row['tlp_dacc'];
            $this->address_dacc = $row['address_dacc'];
        } else {
            $this->alert("Something wrong !!", "?page=home");
        }
    }

    public function update_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_POST['kda']) and ! empty($_POST['a']) and ! empty($_POST['c']) and ! empty($_POST['d']) and ! empty($_POST['e']) and ! empty($_POST['f']) and ! empty($_POST['g'])) {
            $id = $_POST['kda'];
            $a = $_POST['a'];
            $c = $_POST['c'];
            $d = $_POST['d'];
            $e = $_POST['e'];
            $tlp = $this->phone($e);
            $f = $_POST['f'];
            $g = $_POST['g'];
            $query = mysqli_query($con->con, "select * from account inner join detail_account on detail_account.kd_acc=account.kd_acc where account.kd_acc='$id'");
            $row = mysqli_fetch_array($query);
            $imgrmv = $row['photo_dacc'];
            if (!empty($_FILES['fupload']['tmp_name'])) {
                $fupload = $_FILES['fupload']['tmp_name'];
                $nama_file_baru = "AVATAR_" . $kd . "_";
                $this->file($_FILES['fupload']['name'], "asset/img/upload", $nama_file_baru);
                $dir = $this->dir;
                $file = $this->file;
                $img = $dir . $file;
                $kdfile = $this->kode_otomatis("file");
                $ex = $this->ex;
                if ($ex == "jpg" or $ex == "jpeg" or $ex == "png") {
                    if (!empty($_POST['b'])) {
                        $pass = md5($_POST['b']);
                        $up = mysqli_query($con->con, "update account set email_acc='$a',pass_acc='$pass',level_acc='$g' where kd_acc='$id'");
                        $up2 = mysqli_query($con->con, "update detail_account set fullname_dacc='$c',gender_dacc='$d',tlp_dacc='$tlp',address_dacc='$f',photo_dacc='$img' where kd_acc='$id'");
                        if ($imgrmv != "asset/img/avatar/defphoto.jpg") {
                            unlink($imgrmv);
                        }
                        if ($up2) {
                            $upload = move_uploaded_file($_FILES['fupload']['tmp_name'], $img);
                            session_destroy();
                            $this->alert("Update Account Successfully...", "?page=login");
                        } else {
                            $this->alert("Failed To Update, Please Try Again !!", "none");
                        }
                    } else {
                        $up = mysqli_query($con->con, "update account set email_acc='$a',level_acc='$g' where kd_acc='$id'");
                        $up2 = mysqli_query($con->con, "update detail_account set fullname_dacc='$c',gender_dacc='$d',tlp_dacc='$tlp',address_dacc='$f',photo_dacc='$img' where kd_acc='$id'");
                        if ($imgrmv != "asset/img/avatar/defphoto.jpg") {
                            unlink($imgrmv);
                        }
                        if ($up2) {
                            $upload = move_uploaded_file($_FILES['fupload']['tmp_name'], $img);
                            $this->alert("Update Account Successfully...", "?page=account");
                        } else {
                            $this->alert("Failed To Update, Please Try Again !!", "none");
                        }
                    }
                } else {
                    $this->alert("Only Image Allowed !!", "none");
                }
            } else {
                if (!empty($_POST['b'])) {
                    $pass = md5($_POST['b']);
                    $up = mysqli_query($con->con, "update account set email_acc='$a',pass_acc='$pass',level_acc='$g' where kd_acc='$id'");
                    $up2 = mysqli_query($con->con, "update detail_account set fullname_dacc='$c',gender_dacc='$d',tlp_dacc='$tlp',address_dacc='$f' where kd_acc='$id'");
                    if ($up2) {
                        session_destroy();
                        $this->alert("Update Account Successfully...", "?page=login");
                    } else {
                        $this->alert("Failed To Update, Please Try Again !!", "none");
                    }
                } else {
                    $up = mysqli_query($con->con, "update account set email_acc='$a',level_acc='$g' where kd_acc='$id'");
                    $up2 = mysqli_query($con->con, "update detail_account set fullname_dacc='$c',gender_dacc='$d',tlp_dacc='$tlp',address_dacc='$f' where kd_acc='$id'");
                    if ($up2) {
                        $this->alert("Update Account Successfully...", "?page=account");
                    } else {
                        $this->alert("Failed To Update, Please Try Again !!", "none");
                    }
                }
            }
        } else {
            $this->alert("Please Input All From !!", "none");
        }
    }

    public function save_account() {
//Koneksi
        $con = new connection();
        $con->open_connection();
        if (!empty($_POST['a']) and ! empty($_POST['b']) and ! empty($_POST['b2']) and ! empty($_POST['g']) and ! empty($_POST['c']) and ! empty($_POST['d']) and ! empty($_POST['e']) and ! empty($_POST['f'])) {
            $kd1 = $this->kode_otomatis("account");
            $kd2 = $this->kode_otomatis("detail_account");
            $a = $_POST['a'];
            $b = $_POST['b'];
            $b2 = $_POST['b2'];
            $z = $_POST['g'];
            $pass = md5($b);
            $c = $_POST['c'];
            $d = $_POST['d'];
            $e = $_POST['e'];
            $tlp = $this->phone($e);
            $f = $_POST['f'];
            if ($b == $b2) {
                $query = mysqli_query($con->con, "select * from account where email_acc='$a'");
                $cek = mysqli_num_rows($query);
                if ($cek < 1) {
                    if (!empty($_FILES['fupload']['tmp_name'])) {
                        $fupload = $_FILES['fupload']['tmp_name'];
                        $nama_file_baru = "AVATAR_" . $kd1 . "_";
                        $this->file($_FILES['fupload']['name'], "asset/img/upload", $nama_file_baru);
                        $dir = $this->dir;
                        $file = $this->file;
                        $img = $dir . $file;
                        $ex = $this->ex;
                        if ($ex == "jpg" or $ex == "jpeg" or $ex == "png") {
                            $save1 = mysqli_query($con->con, "insert into account values('$kd1','$a','$pass','$z')");
                            $kdfile = $this->kode_otomatis("file");
                            $save2 = mysqli_query($con->con, "insert into detail_account values('$kd2','$c','$d','$tlp','$f','$img','$kd1')");
                            if ($save2) {
                                $upload = move_uploaded_file($_FILES['fupload']['tmp_name'], $img);
                                if ($upload) {
                                    $this->alert("Create New Account Success ...", "?page=account");
                                } else {
                                    $this->alert("Failed To Upload Image !!", "none");
                                }
                            } else {
                                $this->alert("Failed To Save, Please Try Again !!", "none");
                            }
                        } else {
                            $this->alert("Only Image Allowed !!", "none");
                        }
                    } else {
                        $file = "asset/img/avatar/defphoto.jpg";
                        $save1 = mysqli_query($con->con, "insert into account values('$kd1','$a','$pass','$z')");
                        $save2 = mysqli_query($con->con, "insert into detail_account values('$kd2','$c','$d','$tlp','$f','$file','$kd1')");
                        if ($save2) {
                            $this->alert("Create New Account Success ...", "?page=account");
                        } else {
                            $this->alert("Failed To Save, Please Try Again !!", "none");
                        }
                    }
                } else {
                    $this->alert("Email Already Used, Please Use Another Email !!", "none");
                }
            } else {
                $this->alert("Please Check Your Password Again !!!", "none");
            }
        } else {
            $this->alert("Please Input All From !!", "none");
        }
    }

}

class user extends controller {
    
    public function view_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from user ORDER BY nik_user ASC");
        while($row = mysqli_fetch_array($query)){
            echo "<tr><th>$i</th><td>$row[nik_user]</td><td>$row[nama_user]</td><td>$row[departement_user]</td><td>$row[jabatan_user]</td><td><a href='?page=edit-user&id=$row[nik_user]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-user&id=$row[nik_user]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }
    
    public function save_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $nik = $_POST['a'];
        $nama = $_POST['b'];
        $dpr = $_POST['c'];
        $jab = $_POST['d'];
        $cek = strlen($nik);
        if($cek == 16){
            $save = mysqli_query($con->con, "insert into user values('$nik','$nama','$dpr','$jab')");
            if($save){
                $this->alert("Berhasil Menyimpan Data user ...", "?page=user");
            } else{
                $this->alert("Gagal Menyimpan Data user, Silahkan Coba Kembali !!", "none");
            }
        } else{
            $this->alert("Jumlah NIK Harus 16 Digit !!", "none");
        }
    }
    
    public function info_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from user where nik_user='$id'");
        $row = mysqli_fetch_array($query);
        $this->nik = $row['nik_user'];
        $this->nama = $row['nama_user'];
        $this->departement = $row['departement_user'];
        $this->jabatan = $row['jabatan_user'];
    }
    
    public function update_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $nik = $_POST['a'];
        $nama = $_POST['b'];
        $dpr = $_POST['c'];
        $jab = $_POST['d'];
        $up = mysqli_query($con->con, "update user set nama_user='$nama',departement_user='$dpr',jabatan_user='$jab' where nik_user='$nik'");
        if($up){
            $this->alert("Berhasil Mengubah Data user ...", "?page=user");
        } else{
            $this->alert("Gagal Mengubah Data user, Silahkan Coba Kembali !!", "?page=edit-user&id=$nik");
        }
    }
    
    public function delete_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from user where nik_user='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data user ...", "?page=user");
        } else{
            $this->alert("Gagal Menghapus Data user, Silahkan Coba Kembali !!", "none");
        }
    }
    
}

class asset extends controller {
    
    public function view_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from asset ORDER BY no_seri_asset ASC");
        while($row = mysqli_fetch_array($query)){
            $nilai_asset = $this->currency($row['nilai_asset']);
            $tgl = $this->datesql($row['tgl_asset']);
            echo"<tr><th>$i</th><td>$row[no_seri_asset]</td><td>$row[nama_asset]</td><td>$nilai_asset</td><td>$row[jenis_asset]</td><td>$row[merk_asset]</td><td>$row[type_asset]</td><td>$row[spek_asset]</td><td>$tgl</td><td><a href='?page=edit-asset&id=$row[kd_asset]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-asset&id=$row[kd_asset]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }
        public function view_asset_json(){
            //Koneksi
            $con = new connection();
            $con->open_connection();
            $i = 1;
            $array = array();
            $query = mysqli_query($con->con, "select * from asset ORDER BY nama_asset ASC");
            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
         }
    
    public function save_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd = $this->kode_otomatis("asset");
        $ns = $_POST['a'];
        $nama = $_POST['b'];
        $nilai = $_POST['c'];
        $jenis = $_POST['d'];
        $merk = $_POST['e'];
        $tp = $_POST['f'];
        $spek = $_POST['g'];
        $tgl = $this->datesql($_POST['h']);
        $save = mysqli_query($con->con, "insert into asset values('$kd','$ns','$nama','$nilai','$jenis','$merk','$tp','$spek','$tgl')");
        if($save){
            $this->alert("Berhasil Menyimpan Data Asset ...", "?page=asset");
        } else{
            $this->alert("Gagal Menyimpan Data Asset, Silahkan Coba Kembali!!", "none");
        }
    }
    
    public function update_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['id'];
        $ns = $_POST['a'];
        $nama = $_POST['b'];
        $nilai = $_POST['c'];
        $jenis = $_POST['d'];
        $merk = $_POST['e'];
        $tp = $_POST['f'];
        $spek = $_POST['g'];
        $tgl = $this->datesql($_POST['h']);
        $up = mysqli_query($con->con, "update asset set no_seri_asset='$ns',nama_asset='$nama',nilai_asset='$nilai',jenis_asset='$jenis',merk_asset='$merk',type_asset='$tp',spek_asset='$spek',tgl_asset='$tgl' where kd_asset='$id'");
        if($up){
            $this->alert("Berhasil Mengubah Data Asset ...", "?page=asset");
        } else{
            $this->alert("Gagal Mengubah Data Asset, Silahkan Coba Kembali !!", "?page=edit-asset&id=$id");
        }
    }
    
    public function delete_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from asset where kd_asset='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data Asset ...", "?page=asset");
        } else{
            $this->alert("Gagal Menghapus Data Asset, Silahkan Coba Kembali !!", "none");
        }
    }
    
    public function info_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from asset where kd_asset='$id'");
        $row = mysqli_fetch_array($query);
        $this->id = $row['kd_asset'];
        $this->ns = $row['no_seri_asset'];
        $this->nama = $row['nama_asset'];
        $this->nilai = $row['nilai_asset'];
        $this->jenis = $row['jenis_asset'];
        $this->merk = $row['merk_asset'];
        $this->tp = $row['type_asset'];
        $this->spek = $row['spek_asset'];
        $this->tgl = $this->datesql($row['tgl_asset']);
    }
    
}

class jual extends controller{
    
    public function view_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from penjualan inner join asset on asset.kd_asset=penjualan.kd_asset ORDER BY tgl_penjualan ASC");
        while($row = mysqli_fetch_array($query)){
            $nilai_asset = $this->currency($row['nilai_asset']);
            $tgl = $this->datesql($row['tgl_penjualan']);
            if($row['status_penjualan'] == "lelang"){
                $status = "Lelang";
            } else{
                $status = "Pra Lelang";
            }
            echo"<tr><th>$i</th><td>$tgl</td><td>$status</td><td>$row[no_seri_asset]</td><td>$row[nama_asset]</td><td>$nilai_asset</td><td>$row[jenis_asset]</td><td>$row[merk_asset]</td><td>$row[type_asset]</td><td>$row[spek_asset]</td><td><a href='?page=edit-penjualan&id=$row[kd_penjualan]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-penjualan&id=$row[kd_penjualan]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }
    
    public function save_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd_jual = $this->kode_otomatis("penjualan");
        $ns = $_POST['a'];
        $nama = $_POST['b'];
        $nilai = $_POST['c'];
        $jenis = $_POST['d'];
        $merk = $_POST['e'];
        $tp = $_POST['f'];
        $spek = $_POST['g'];
        $tgl = $this->datesql($_POST['tgl']);
        $status = $_POST['status'];
        $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            $kd = $row['kd_asset'];
            $save_jual = mysqli_query($con->con, "insert into penjualan values('$kd_jual','$status','$tgl','$kd')");
            if($save_jual){
                $this->alert("Berhasil Menyimpan Data Penjualan ...", "?page=penjualan");
            } else{
                $this->alert("Gagal Menyimpan Data Penjualan, Silahkan Coba Kembali!!", "none");
            }
        } else{
            $kd = $this->kode_otomatis("asset");
            $save_asset = mysqli_query($con->con, "insert into asset values('$kd','$ns','$nama','$nilai','$jenis','$merk','$tp','$spek')");
            if($save_asset){
                $save_jual = mysqli_query($con->con, "insert into penjualan values('$kd_jual','$status','$tgl','$kd')");
                if($save_jual){
                    $this->alert("Berhasil Menyimpan Data Penjualan ...", "?page=penjualan");
                } else{
                    $this->alert("Gagal Menyimpan Data Penjualan, Silahkan Coba Kembali!!", "none");
                }
            } else{
                $this->alert("Gagal Menyimpan Data Asset Baru, Silahkan Coba Kembali!!", "none");
            }
        }
    }
    
    public function info_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from penjualan inner join asset on asset.kd_asset=penjualan.kd_asset where penjualan.kd_penjualan='$id'");
        $row = mysqli_fetch_array($query);
        $this->ns = $row['no_seri_asset'];
        $this->nama = $row['nama_asset'];
        $this->nilai = $row['nilai_asset'];
        $this->jenis = $row['jenis_asset'];
        $this->merk = $row['merk_asset'];
        $this->tp = $row['type_asset'];
        $this->spek = $row['spek_asset'];
        $this->id = $row['kd_penjualan'];
        $this->tgl = $this->datesql($row['tgl_penjualan']);
        if($row['status_penjualan'] == "lelang"){
            $this->status = "<option value='lelang'>Lelang</option><option value='pralelang'>Pra Lelang</option>";
        } else{
            $this->status = "<option value='pralelang'>Pra Lelang</option><option value='lelang'>Lelang</option>";
        }
    }
    
    public function update_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['id'];
        $ns = $_POST['a'];
        $nama = $_POST['b'];
        $nilai = $_POST['c'];
        $jenis = $_POST['d'];
        $merk = $_POST['e'];
        $tp = $_POST['f'];
        $spek = $_POST['g'];
        $tgl = $this->datesql($_POST['tgl']);
        $status = $_POST['status'];
        $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            $kd = $row['kd_asset'];
            $up_jual = mysqli_query($con->con, "update penjualan set status_penjualan='$status',tgl_penjualan='$tgl',kd_asset='$kd' where kd_penjualan='$id'");
            if($up_jual){
                $this->alert("Berhasil Mengubah Data Penjualan ...", "?page=penjualan");
            } else{
                $this->alert("Gagal Mengubah Data Penjualan, Silahkan Coba Kembali!!", "?page=edit-penjualan&id=$id");
            }
        } else{
            $kd = $this->kode_otomatis("asset");
            $save_asset = mysqli_query($con->con, "insert into asset values('$kd','$ns','$nama','$nilai','$jenis','$merk','$tp','$spek')");
            if($save_asset){
                $up_jual = mysqli_query($con->con, "update penjualan set status_penjualan='$status',tgl_penjualan='$tgl',kd_asset='$kd' where kd_penjualan='$id'");
                if($up_jual){
                    $this->alert("Berhasil Mengubah Data Penjualan ...", "?page=penjualan");
                } else{
                    $this->alert("Gagal Mengubah Data Penjualan, Silahkan Coba Kembali!!", "?page=edit-penjualan&id=$id");
                }
            } else{
                $this->alert("Gagal Mengubah Data Penjualan, Silahkan Coba Kembali!!", "?page=edit-penjualan&id=$id");
            }
        }
    }
    
    public function delete_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from penjualan where kd_penjualan='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data Penjualan ...", "?page=penjualan");
        } else{
            $this->alert("Gagal Menghapus Data Penjualan, Silahkan Coba Kembali !!", "none");
        }
    }
    
}

class pinjam extends controller {
    
    public function view_pinjam(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from pinjam inner join user on user.nik_user=pinjam.nik_user inner join asset on asset.kd_asset=pinjam.kd_asset ORDER BY pinjam.periode_pinjam ASC");
        while($row = mysqli_fetch_array($query)){
            $tgl = $this->datesql($row['periode_pinjam']);
            $nilai = $this->currency($row['nilai_asset']);
            echo"<tr><th>$i</th><td>$tgl</td><td>$row[nik_user]</td><td>$row[nama_user]</td><td>$row[jabatan_user]</td><td>$row[no_seri_asset]</td><td>$row[nama_asset]</td><td>$nilai</td><td><a href='?page=edit-peminjaman&id=$row[kd_pinjam]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-peminjaman&id=$row[kd_pinjam]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }


    public function lap_pinjam(){
        $tglawal = date("Y-m-d",strtotime($_POST['tglawal']));;
        $tglakhir = date("Y-m-d",strtotime($_POST['tglakhir']));
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $array = array();
        $query = mysqli_query($con->con, "select * from pinjam, user, asset where user.nik_user=pinjam.nik_user and asset.kd_asset=pinjam.kd_asset and pinjam.periode_pinjam BETWEEN '$tglawal' AND '$tglakhir' ORDER BY pinjam.periode_pinjam ASC");
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
        echo json_encode($array);
    }
    
    public function save_pinjam(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd_pinjam = $this->kode_otomatis("pinjam");
        $nik = $_POST['a'];
        $namauser = $_POST['b'];
        $dep = $_POST['c'];
        $jab = $_POST['d'];
        $ns = $_POST['e'];
        $nama = $_POST['f'];
        $nilai = $_POST['g'];
        $jenis = $_POST['h'];
        $merk = $_POST['i'];
        $tp = $_POST['j'];
        $spek = $_POST['k'];
        $tgl = $this->datesql($_POST['tgl']);
        $query = mysqli_query($con->con, "select * from user where nik_user='$nik'");
        $cek = mysqli_num_rows($query);
        if($cek == 0){
            $save_user = mysqli_query($con->con, "insert into user values('$nik','$namauser','$dep','$jab')");
        }
        $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            $kd = $row['kd_asset'];
            $save_pinjam = mysqli_query($con->con, "insert into pinjam values('$kd_pinjam','$tgl','$nik','$kd')");
            if($save_pinjam){
                $this->alert("Berhasil Menyimpan Data Peminjaman ...", "?page=peminjaman");
            } else{
                $this->alert("Gagal Menyimpan Data Peminjaman, Silahkan Coba Kembali!!", "none");
            }
        } else{
            $kd = $this->kode_otomatis("asset");
            $save_asset = mysqli_query($con->con, "insert into asset values('$kd','$ns','$nama','$nilai','$jenis','$merk','$tp','$spek')");
            if($save_asset){
                $save_pinjam = mysqli_query($con->con, "insert into pinjam values('$kd_pinjam','$tgl','$nik','$kd')");
                if($save_pinjam){
                    $this->alert("Berhasil Menyimpan Data Peminjaman ...", "?page=peminjaman");
                } else{
                    $this->alert("Gagal Menyimpan Data Peminjaman, Silahkan Coba Kembali!!", "none");
                }
            } else{
                $this->alert("Gagal Menyimpan Data Asset Baru, Silahkan Coba Kembali!!", "none");
            }
        }
    }
    
    function delete_pinjam(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from pinjam where kd_pinjam='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data Peminjaman ...", "?page=peminjaman");
        } else{
            $this->alert("Gagal Menghapus Data Peminjaman, Silahkan Coba Kembali !!", "none");
        }
    }
    
    function info_pinjam(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from pinjam inner join user on user.nik_user=pinjam.nik_user inner join asset on asset.kd_asset=pinjam.kd_asset where pinjam.kd_pinjam='$id'");
        $row = mysqli_fetch_array($query);
        $this->id = $row['kd_pinjam'];
        $this->tgl = $this->datesql($row['periode_pinjam']);
        $this->ns = $row['no_seri_asset'];
        $this->nama = $row['nama_asset'];
        $this->nilai = $row['nilai_asset'];
        $this->jenis = $row['jenis_asset'];
        $this->merk = $row['merk_asset'];
        $this->tp = $row['type_asset'];
        $this->spek = $row['spek_asset'];
        $this->nik = $row['nik_user'];
        $this->namauser = $row['nama_user'];
        $this->departement = $row['departement_user'];
        $this->jabatan = $row['jabatan_user'];
    }
    
    public function update_pinjam(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd_pinjam = $_POST['id'];
        $nik = $_POST['a'];
        $namauser = $_POST['b'];
        $dep = $_POST['c'];
        $jab = $_POST['d'];
        $ns = $_POST['e'];
        $nama = $_POST['f'];
        $nilai = $_POST['g'];
        $jenis = $_POST['h'];
        $merk = $_POST['i'];
        $tp = $_POST['j'];
        $spek = $_POST['k'];
        $tgl = $this->datesql($_POST['tgl']);
        $query = mysqli_query($con->con, "select * from user where nik_user='$nik'");
        $cek = mysqli_num_rows($query);
        if($cek == 0){
            $save_user = mysqli_query($con->con, "insert into user values('$nik','$namauser','$dep','$jab')");
        }
        $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            $kd = $row['kd_asset'];
            $update_pinjam = mysqli_query($con->con, "update pinjam set periode_pinjam='$tgl',nik_user='$nik',kd_asset='$kd' where kd_pinjam='$kd_pinjam'");
            if($update_pinjam){
                $this->alert("Berhasil Mengubah Data Peminjaman ...", "?page=peminjaman");
            } else{
                $this->alert("Gagal Mengubah Data Peminjaman, Silahkan Coba Kembali!!", "?page=edit-peminjaman&id=$kd_pinjam");
            }
        } else{
            $kd = $this->kode_otomatis("asset");
            $save_asset = mysqli_query($con->con, "insert into asset values('$kd','$ns','$nama','$nilai','$jenis','$merk','$tp','$spek')");
            if($save_asset){
                $update_pinjam = mysqli_query($con->con, "update pinjam set periode_pinjam='$tgl',nik_user='$nik',kd_asset='$kd' where kd_pinjam='$kd_pinjam'");
                if($update_pinjam){
                    $this->alert("Berhasil Mengubah Data Peminjaman ...", "?page=peminjaman");
                } else{
                    $this->alert("Gagal Mengubah Data Peminjaman, Silahkan Coba Kembali!!", "?page=edit-peminjaman&id=$kd_pinjam");
                }
            } else{
                $this->alert("Gagal Menyimpan Data Asset Baru, Silahkan Coba Kembali!!", "?page=edit-peminjaman&id=$kd_pinjam");
            }
        }
    }
    
}

class gudang extends controller{
    
    function save_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd = $this->kode_otomatis("gudang");
        $ns = $_POST['a'];
        $des = $_POST['h'];
        if(!empty($ns)){
            $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
            $row = mysqli_fetch_array($query);
            $id = $row['kd_asset'];
            $save = mysqli_query($con->con, "insert into gudang values('$kd','$des','$id')");
            if($save){
                $this->alert("Berhasil Menyimpan Data Asset Di Gudang", "?page=gudang");
            } else{
                $this->alert("Gagal Menyimpan Data Asset Di Gudang, Silahkan Coba Kembali!!", "none");
            }
        } else{
            $this->alert("Isi Semua Data Dengan Benar!!", "none");
        }
    }
    
    function view_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from gudang inner join asset on asset.kd_asset=gudang.kd_asset ORDER BY asset.no_seri_asset ASC");
        while($row = mysqli_fetch_array($query)){
            $nilai_asset = $this->currency($row['nilai_asset']);
            echo"<tr><th>$i</th><td>$row[no_seri_asset]</td><td>$row[nama_asset]</td><td>$nilai_asset</td><td>$row[jenis_asset]</td><td>$row[merk_asset]</td><td>$row[type_asset]</td><td>$row[spek_asset]</td><td>$row[deskripsi_gudang]</td><td><a href='?page=edit-gudang&id=$row[kd_gudang]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-gudang&id=$row[kd_gudang]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }

    function lap_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $array = array();
        $query = mysqli_query($con->con, "select * from gudang inner join asset on asset.kd_asset=gudang.kd_asset ORDER BY asset.no_seri_asset ASC");
        while($row = mysqli_fetch_array($query)){
           $array[] = $row;
        }
        echo json_encode($array);
    }
    
    function delete_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from gudang where kd_gudang='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data Gudang ...", "?page=gudang");
        } else{
            $this->alert("Gagal Menghapus Data Gudang, Silahkan Coba Kembali !!", "none");
        }
    }
    
    function info_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from gudang inner join asset on asset.kd_asset=gudang.kd_asset where gudang.kd_gudang='$id'");
        $row = mysqli_fetch_array($query);
        $this->id = $row['kd_gudang'];
        $this->deskrip = $row['deskripsi_gudang'];
        $this->ns = $row['no_seri_asset'];
        $this->nama = $row['nama_asset'];
        $this->nilai = $row['nilai_asset'];
        $this->jenis = $row['jenis_asset'];
        $this->merk = $row['merk_asset'];
        $this->tp = $row['type_asset'];
        $this->spek = $row['spek_asset'];
    }
    
    function update_gudang(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd = $_POST['id'];
        $ns = $_POST['a'];
        $des = $_POST['h'];
        if(!empty($ns)){
            $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
            $row = mysqli_fetch_array($query);
            $id = $row['kd_asset'];
            $save = mysqli_query($con->con, "update gudang set deskripsi_gudang='$des',kd_asset='$id' where kd_gudang='$kd'");
            if($save){
                $this->alert("Berhasil Mengubah Data Asset Di Gudang", "?page=gudang");
            } else{
                $this->alert("Gagal Mengubah Data Asset Di Gudang, Silahkan Coba Kembali!!", "?page=edit-gudang&id=$kd");
            }
        } else{
            $this->alert("Isi Semua Data Dengan Benar!!", "none");
        }
    }
    
}

class maintenance extends controller{
    
    function save_maintenance(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd = $this->kode_otomatis("maintenance");
        $tgl = $this->datesql($_POST['tgl']);
        $deskrip = $_POST['deskrip'];
        $ns = $_POST['a'];
        if(!empty($ns)){
            $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
            $row = mysqli_fetch_array($query);
            $id = $row['kd_asset'];
            $query_srvc = mysqli_query($con->con, "select * from maintenance where kd_asset='$id' ORDER BY periode_maintenance DESC LIMIT 1");
            $row_srvc = mysqli_fetch_array($query_srvc);

            $date_srvc = $row_srvc ? $row_srvc['periode_maintenance'] : date('Y-m-d', strtotime("+40 days"));
            $date1=date_create($tgl);
            $date2=date_create($date_srvc);
            $diff=date_diff($date1,$date2);
            $day = $diff->format("%a");
            if($day > 30){
                $save = mysqli_query($con->con, "insert into maintenance values('$kd','$tgl','$deskrip','$id')");
                if($save){
                    $this->alert("Berhasil Menyimpan Data Asset Di Maintenance", "?page=maintenance");
                } else{
                    $this->alert("Gagal Menyimpan Data Asset Di Maintenance, Silahkan Coba Kembali!!", "none");
                }
            }else{
                $this->alert("Gagal Menyimpan Data Asset Di Maintenance Karena Tanggal Tidak lebih dari 30 Hari Sejak Terakhir Di Maintenance, Silahkan Coba Kembali!!", "none");
            }
        } else{
            $this->alert("Isi Semua Data Dengan Benar!!", "none");
        }
    }
    
    function view_maintenance(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $query = mysqli_query($con->con, "select * from maintenance inner join asset on asset.kd_asset=maintenance.kd_asset ORDER BY maintenance.periode_maintenance ASC");
        while($row = mysqli_fetch_array($query)){
            $tgl = $this->datesql($row['periode_maintenance']);
            $nilai_asset = $this->currency($row['nilai_asset']);
            echo"<tr><th>$i</th><td>$tgl</td><td>$row[no_seri_asset]</td><td>$row[nama_asset]</td><td>$nilai_asset</td><td>$row[merk_asset]</td><td>$row[deskripsi_maintenance]</td><td><a href='?page=edit-maintenance&id=$row[kd_maintenance]'><i class='fa fa-edit'></i> Edit</a> | <a href='?page=delete-maintenance&id=$row[kd_maintenance]' onclick=\"javascript: return confirm('Are You Sure Want To Delete ?');\" class='text-red'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
            $i++;
        }
    }

     function lap_maintenance(){
        $tglawal = date("Y-m-d",strtotime($_POST['tglawal']));;
        $tglakhir = date("Y-m-d",strtotime($_POST['tglakhir']));
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $i = 1;
        $array = array();
        $query = mysqli_query($con->con, "SELECT * from maintenance inner join asset on asset.kd_asset=maintenance.kd_asset WHERE maintenance.periode_maintenance BETWEEN '$tglawal' AND '$tglakhir' ORDER BY maintenance.periode_maintenance ASC");
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
        echo json_encode($array);
    }
    
    function delete_maintenance(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $del = mysqli_query($con->con, "delete from maintenance where kd_maintenance='$id'");
        if($del){
            $this->alert("Berhasil Menghapus Data Maintenance ...", "?page=maintenance");
        } else{
            $this->alert("Gagal Menghapus Data Maintenance, Silahkan Coba Kembali !!", "none");
        }
    }
    
    function info_maintenance(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_GET['id'];
        $query = mysqli_query($con->con, "select * from maintenance inner join asset on asset.kd_asset=maintenance.kd_asset where maintenance.kd_maintenance='$id'");
        $row = mysqli_fetch_array($query);
        $this->id = $row['kd_maintenance'];
        $this->tgl = $this->datesql($row['periode_maintenance']);
        $this->deskrip = $row['deskripsi_maintenance'];
        $this->ns = $row['no_seri_asset'];
        $this->nama = $row['nama_asset'];
        $this->nilai = $row['nilai_asset'];
        $this->jenis = $row['jenis_asset'];
        $this->merk = $row['merk_asset'];
        $this->tp = $row['type_asset'];
        $this->spek = $row['spek_asset'];
    }
    
    function update_maintenance(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $kd = $_POST['id'];
        $tgl = $this->datesql($_POST['tgl']);
        $deskrip = $_POST['deskrip'];
        $ns = $_POST['a'];
        if(!empty($ns)){
            $query = mysqli_query($con->con, "select * from asset where no_seri_asset='$ns'");
            $row = mysqli_fetch_array($query);
            $id = $row['kd_asset'];
            $update = mysqli_query($con->con, "update maintenance set periode_maintenance='$tgl',deskripsi_maintenance='$deskrip',kd_asset='$id' where kd_maintenance='$kd'");
            if($update){
                $this->alert("Berhasil Mengubah Data Asset Di Maintenance", "?page=maintenance");
            } else{
                $this->alert("Gagal Mengubah Data Asset Di Maintenance, Silahkan Coba Kembali!!", "?page=edit-maintenance&id=$kd");
            }
        } else{
            $this->alert("Isi Semua Data Dengan Benar!!", "none");
        }
    }
    
}

class ajax extends controller {
    
    public function depresiasi(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['q'];
        $data = explode(",", $id);
        $asset = $data[0];
        $nilai = $data[1];
        $tgl = $data[2];
        $date = explode("-", $tgl);
        $bulan = $date[1] * 1;
        $tahun = $date[2];
        $query = mysqli_query($con->con, "select * from asset where nama_asset='$asset'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $nilai_peroleh = $this->currency($nilai);
            $rentang = 0;
            $akum = 0;
            $result = "";
            $np = "-";
            $beli = "-";
            $akum_show = "-";
            $nb_awal = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            for($i=0;$i<5;$i++){
                if($i == 0){
                    $tbcolor = "box-primary";
                    $beli = $nilai_peroleh;
                    $rentang = $bulan - 1;
                    $susut = 0;
                    $nb = 0;
                    for($x=$rentang;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        }
                    }
                } else if($i == 1){
                    $tbcolor = "box-success";
                    $np = $nilai_peroleh;
                    $beli = "-";
                    $akum = $akum + $susut;
                    $akum_show = $this->currency($akum);
                    $nb_awal = $this->currency($nb);
                    $susut = 0;
                    $nilai = $nb;
                    for($x=0;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        };
                    }
                } else if($i == 2){
                    $tbcolor = "box-info";
                    $np = $nilai_peroleh;
                    $beli = "-";
                    $akum = $akum + $susut;
                    $akum_show = $this->currency($akum);
                    $nb_awal = $this->currency($nb);
                    $susut = 0;
                    $nilai = $nb;
                    for($x=0;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        };
                    }
                } else if($i == 3){
                    $tbcolor = "box-warning";
                    $np = $nilai_peroleh;
                    $beli = "-";
                    $akum = $akum + $susut;
                    $akum_show = $this->currency($akum);
                    $nb_awal = $this->currency($nb);
                    $susut = 0;
                    $nilai = $nb;
                    for($x=0;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        }
                    }
                } else{
                    $tbcolor = "box-danger";
                    $np = $nilai_peroleh;
                    $beli = "-";
                    $akum = $akum + $susut;
                    $akum_show = $this->currency($akum);
                    $nb_awal = $this->currency($nb);
                    $susut = $nb;
                    $nilai = $nb;
                    $rentang = $bulan - 1;
                    for($x=0;$x<$rentang;$x++){
                        $fn = 12 - $bulan + 1;
                        $fn = 12 - $fn;
                        $hasil = $nilai / $fn;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        }
                    }
                    $rentang = $bulan - 1;
                    for($x=$rentang;$x<12;$x++){
                        $bln[$x] = "-";
                    }
                    $nb = 0;
                }
                $susut_show = $this->currency($susut);
                $nb_show = $this->currency($nb);
                $result = $result . "<div class='col-xs-12'>
                            <div class='box $tbcolor'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Depresiasi Asset $asset Pada Tahun $tahun</h3>
                                </div>
                                <div class='box'>
                                    <div class='box-body table-responsive no-padding'>
                                        <table class='table table-hover'  name='cart'>
                                            <tr>
                                                <th rowspan='2' style='text-align: center;'>Unit</th>
                                                <th rowspan='2' style='text-align: center;'>KETERANGAN</th>
                                                <th rowspan='2' style='text-align: center;'>Tanggal <br>Perolehan</th>
                                                <th rowspan='2' style='text-align: center;'>Nilai <br> Perolehan</th>
                                                <th rowspan='2' style='text-align: center;'>Pembelian <br> $tahun</th>
                                                <th rowspan='2' style='text-align: center;'>Akumulasi <br> Awal</th>
                                                <th rowspan='2' style='text-align: center;'>Nilai Buku <br> Awal $tahun</th>
                                                <th colspan='12' style='text-align: center;'>BULAN PENYUSUTAN</th>
                                                <th rowspan='2' style='text-align: center;'>PENYUSUTAN $tahun <br> BIAYA</th>
                                                <th rowspan='2' style='text-align: center;'>NILAI BUKU <br> $tahun</th>
                                            </tr>
                                            <tr>
                                                <th style='text-align: center;'>JAN</th>
                                                <th style='text-align: center;'>FEB</th>
                                                <th style='text-align: center;'>MRT</th>
                                                <th style='text-align: center;'>APR</th>
                                                <th style='text-align: center;'>MEI</th>
                                                <th style='text-align: center;'>JUN</th>
                                                <th style='text-align: center;'>JUL</th>
                                                <th style='text-align: center;'>AGST</th>
                                                <th style='text-align: center;'>SEPT</th>
                                                <th style='text-align: center;'>OKT</th>
                                                <th style='text-align: center;'>NOV</th>
                                                <th style='text-align: center;'>DES</th>
                                            </tr>
                                            <tbody>
                                                <tr>
                                                    <td style='text-align: center;'>1</td>
                                                    <td>$asset</td>
                                                    <td style='text-align: center;'>$tgl</td>
                                                    <td style='text-align: center;'>$np</td>
                                                    <td style='text-align: center;'>$beli</td>
                                                    <td style='text-align: center;'>$akum_show</td>
                                                    <td style='text-align: center;'>$nb_awal</td>
                                                    <td style='text-align: center;'>$bln[0]</td>
                                                    <td style='text-align: center;'>$bln[1]</td>
                                                    <td style='text-align: center;'>$bln[2]</td>
                                                    <td style='text-align: center;'>$bln[3]</td>
                                                    <td style='text-align: center;'>$bln[4]</td>
                                                    <td style='text-align: center;'>$bln[5]</td>
                                                    <td style='text-align: center;'>$bln[6]</td>
                                                    <td style='text-align: center;'>$bln[7]</td>
                                                    <td style='text-align: center;'>$bln[8]</td>
                                                    <td style='text-align: center;'>$bln[9]</td>
                                                    <td style='text-align: center;'>$bln[10]</td>
                                                    <td style='text-align: center;'>$bln[11]</td>
                                                    <td style='text-align: center;'>$susut_show</td>
                                                    <td style='text-align: center;'>$nb_show</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>";
                $tahun++;
            }
            echo"$result::";
        } else{
            echo"::";
        }
        
    }

        public function depresiasi_jual(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['q'];
        $data = explode(",", $id);
        $asset = $data[0];
        $nilai = $data[1];
        $query = mysqli_query($con->con, "select * from asset where nama_asset='$asset' limit 1");
        $cek = mysqli_num_rows($query);
        $roww = mysqli_fetch_array($query);
        $date_as = date("Y-m-d",strtotime($roww['tgl_asset']));

        $tgl = $data[2];
        $date = explode("-", $date_as);
        $bulan = $date[1] * 1;
        $tahun = $date[0];

        $date1=date_create($date_as);
        $date2=date_create($tgl);
        $diff=date_diff($date1,$date2);
        $day = $diff->format("%a");

        $th_loop = floor($day / 365);

        if($cek > 0 AND $date1 < $date2){
            $nilai_peroleh = $this->currency($nilai);
            $rentang = 0;
            $akum = 0;
            $result = "";
            $np = "-";
            $beli = "-";
            $akum_show = "-";
            $nb_awal = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";
            $bln[] = "-";


            for($i=0;$i<=$th_loop;$i++){
                if($i == 0){
                    $tbcolor = "box-primary";
                    $beli = $nilai_peroleh;
                    $rentang = $bulan - 1;
                    $susut = 0;
                    $nb = 0;
                    for($x=$rentang;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        }
                    }
                } else if($i <= $th_loop AND $i != 0){
                    $tbcolor = "box-success";
                    $np = $nilai_peroleh;
                    $beli = "-";
                    $akum = $akum + $susut;
                    $akum_show = $this->currency($akum);
                    $nb_awal = $this->currency($nb);
                    $susut = 0;
                    $nilai = $nb;
                    for($x=0;$x<12;$x++){
                        $hasil = $nilai * 0.25 / 12;
                        $susut = round($susut + $hasil);
                        $nb = $nilai - $susut;
                        if( strpos( $hasil, ".") !== false) {
                            $pecah = explode(".", "$hasil");
                            $koma = substr($pecah[1], 0,2);
                            $hasil_show = $this->currency($pecah[0]);
                            $bln[$x] = $hasil_show . "," . $koma;
                        } else{
                            $hasil_show = $this->currency($hasil);
                            $bln[$x] = $hasil_show;
                        };
                    }
                } 

                $susut_show = $this->currency($susut);
                $nb_show = $this->currency($nb);
                $result = $result . "<div class='col-xs-12'>
                            <div class='box $tbcolor'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Depresiasi Asset $asset Pada Tahun $tahun</h3>
                                </div>
                                <div class='box'>
                                    <div class='box-body table-responsive no-padding'>
                                        <table class='table table-hover'  name='cart'>
                                            <tr>
                                                <th rowspan='2' style='text-align: center;'>Unit</th>
                                                <th rowspan='2' style='text-align: center;'>KETERANGAN</th>
                                                <th rowspan='2' style='text-align: center;'>Tanggal <br>Perolehan</th>
                                                <th rowspan='2' style='text-align: center;'>Nilai <br> Perolehan</th>
                                                <th rowspan='2' style='text-align: center;'>Pembelian <br> $tahun</th>
                                                <th rowspan='2' style='text-align: center;'>Akumulasi <br> Awal</th>
                                                <th rowspan='2' style='text-align: center;'>Nilai Buku <br> Awal $tahun</th>
                                                <th colspan='12' style='text-align: center;'>BULAN PENYUSUTAN</th>
                                                <th rowspan='2' style='text-align: center;'>PENYUSUTAN $tahun <br> BIAYA</th>
                                                <th rowspan='2' style='text-align: center;'>NILAI BUKU <br> $tahun</th>
                                            </tr>
                                            <tr>
                                                <th style='text-align: center;'>JAN</th>
                                                <th style='text-align: center;'>FEB</th>
                                                <th style='text-align: center;'>MRT</th>
                                                <th style='text-align: center;'>APR</th>
                                                <th style='text-align: center;'>MEI</th>
                                                <th style='text-align: center;'>JUN</th>
                                                <th style='text-align: center;'>JUL</th>
                                                <th style='text-align: center;'>AGST</th>
                                                <th style='text-align: center;'>SEPT</th>
                                                <th style='text-align: center;'>OKT</th>
                                                <th style='text-align: center;'>NOV</th>
                                                <th style='text-align: center;'>DES</th>
                                            </tr>
                                            <tbody>
                                                <tr>
                                                    <td style='text-align: center;'>1</td>
                                                    <td>$asset</td>
                                                    <td style='text-align: center;'>$tgl</td>
                                                    <td style='text-align: center;'>$np</td>
                                                    <td style='text-align: center;'>$beli</td>
                                                    <td style='text-align: center;'>$akum_show</td>
                                                    <td style='text-align: center;'>$nb_awal</td>
                                                    <td style='text-align: center;'>$bln[0]</td>
                                                    <td style='text-align: center;'>$bln[1]</td>
                                                    <td style='text-align: center;'>$bln[2]</td>
                                                    <td style='text-align: center;'>$bln[3]</td>
                                                    <td style='text-align: center;'>$bln[4]</td>
                                                    <td style='text-align: center;'>$bln[5]</td>
                                                    <td style='text-align: center;'>$bln[6]</td>
                                                    <td style='text-align: center;'>$bln[7]</td>
                                                    <td style='text-align: center;'>$bln[8]</td>
                                                    <td style='text-align: center;'>$bln[9]</td>
                                                    <td style='text-align: center;'>$bln[10]</td>
                                                    <td style='text-align: center;'>$bln[11]</td>
                                                    <td style='text-align: center;'>$susut_show</td>
                                                    <td style='text-align: center;'>$nb_show</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>";
                $tahun++;
            }
            echo"$result::";
        } else{
            if ($date1 < $date2) {
                echo"Tanggal Tidak Sesuai::";    
            }else{
                echo"::";   
            }
        }
        
    }

     public function lap_dep(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $date_close = date("Y-m-d",strtotime($_POST['q']));
        $query = mysqli_query($con->con, "select * from asset where tgl_asset < '$date_close' ORDER BY nama_asset ASC");
        $array = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($query)){
            $nilai = $row["nilai_asset"];
            $tglprlh = $row["tgl_asset"];//y-m-d
            $tglclose = $_POST['q'];//d-m-y
            
            $dateprlh = explode("-", $tglprlh);
            $dateclose = explode("-", $tglclose);
            $blnclose = $dateclose[1] * 1;
            $blnprlh = $dateprlh[1] * 1;
            $tahunprlh = $dateprlh[0];
            $tahunclose = $dateclose[2];

            $ttlthn = $tahunclose - $tahunprlh;
            $sisabln1 = $blnclose - $blnprlh;
            $ttlbln = $ttlthn * 12 + $sisabln1;
            $nilaiperbulan = $nilai * 0.25 / 12;
            $nilaipenyusutan = $nilaiperbulan * $ttlbln;
            $nilaipenyusutan = $nilaipenyusutan >= 0 ?$nilaipenyusutan:0;
            $nilai_akhir = $nilai - $nilaipenyusutan;

            $array[] = $row;
            array_push($array[$i++], $this->currency($nilai_akhir),$this->currency($nilaiperbulan),$this->currency($nilaipenyusutan));
        }
         
        
        echo json_encode($array);
        
    }

    public function list_asset() {
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $key = strtolower($_GET['key']);
        $array = array();
        $query = mysqli_query($con->con, "select * from asset where (`nama_asset` LIKE '%" . $key . "%') ORDER BY nama_asset ASC");
        while ($row = mysqli_fetch_assoc($query)) {
            if (strpos(strtolower($row['nama_asset']), $key) !== false) {
                $array[] = $row['nama_asset'];
            }
        }
        echo json_encode($array);
    }
    
    public function get_data_asset(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['q'];
        $query = mysqli_query($con->con, "select * from asset where nama_asset='$id'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            $tgl = $this->datesql($row['tgl_asset']);
            echo"$row[no_seri_asset]::$row[nama_asset]::$row[nilai_asset]::$row[jenis_asset]::$row[merk_asset]::$row[type_asset]::$row[spek_asset]::$tgl";
        } else{
            echo"::::::::::::::";
        }
        
    }
    
    public function list_user() {
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $key = strtolower($_GET['key']);
        $array = array();
        $query = mysqli_query($con->con, "select * from user where (`nik_user` LIKE '%" . $key . "%') ORDER BY nama_user ASC");
        while ($row = mysqli_fetch_assoc($query)) {
            if (strpos(strtolower($row['nik_user']), $key) !== false) {
                $array[] = $row['nik_user'];
            }
        }
        echo json_encode($array);
    }
    
    public function get_data_user(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $id = $_POST['q'];
        $query = mysqli_query($con->con, "select * from user where nik_user='$id'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $row = mysqli_fetch_array($query);
            echo"$row[nik_user]::$row[nama_user]::$row[departement_user]::$row[jabatan_user]";
        } else{
            echo"::::::::::::";
        }
        
    }

}

class other{
    
    public function info_beranda(){
        //Koneksi
        $con = new connection();
        $con->open_connection();
        $query = mysqli_query($con->con, "select * from penjualan");
        $cek = mysqli_num_rows($query);
        $this->jual = $cek;
        $query = mysqli_query($con->con, "select * from pinjam");
        $cek = mysqli_num_rows($query);
        $this->pinjam = $cek;
        $query = mysqli_query($con->con, "select * from gudang");
        $cek = mysqli_num_rows($query);
        $this->gudang = $cek;
        $query = mysqli_query($con->con, "select * from maintenance");
        $cek = mysqli_num_rows($query);
        $this->mt = $cek;
    }
    
}

class report extends controller {
        //fill in With Design Report

    public function penjualan_report(){

        $con = new connection();
        $con->open_connection();

        if (empty($_POST["q"])) {
            $id = $_POST['stts'].",".$_POST['startdate'].",".$_POST['enddate'];            
        }else{
            $id = $_POST['q'];
        }

        $data = explode(",", $id);
        $status = $data[0];
        $startDate = date("Y-m-d",strtotime($data[1]));
        $endDate = date("Y-m-d",strtotime($data[2]));
        
        $array = array();
        if ($status == 'lelang' OR $status == 'pralelang') {
            $query = mysqli_query($con->con, "select * from penjualan, asset WHERE asset.kd_asset=penjualan.kd_asset AND `tgl_penjualan` BETWEEN '$startDate' AND '$endDate' AND penjualan.status_penjualan='$status' ORDER BY `tgl_penjualan` ASC");   
        }else{
            $query = mysqli_query($con->con, "select * from penjualan, asset WHERE asset.kd_asset=penjualan.kd_asset AND `tgl_penjualan` BETWEEN '$startDate' AND '$endDate' ORDER BY `tgl_penjualan` ASC");
        }
        while ($row = mysqli_fetch_assoc($query)) {
            $array[]=$row;
        }

            if (empty($_POST["q"])) {
                return $array;            
            }else{
                echo json_encode($array); 
            }
    }

}
