<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript">
    
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    }); 

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0)
                rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function convertToAngka(rupiah) {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''));
    }

    var myChart,myChart2,urlpie,urlgraph;

    function view_lap_dep(){
      var dateClose = document.getElementById('dateClose').value;
      var no = 1 ;
      var records;
      var totalAsset = 0;

            $("#buttonCetak").html(`<table><td><form method="POST" id="lap_dep" action="?page=lap_dep_pdf" target="_blank">
                        
                        <input type="text" name="datadep" id="datadep" hidden/>

                        <input type="text" name="tgltutup" value="`+dateClose+`" hidden/>
                        <button type="button" name="submit_dep_pdf" id="submit_dep_pdf" class="btn btn-primary">Lihat PDF</button></form></td><td>||</td><td>
                        <form method="POST" id="make_excel_dep" action="?page=lap_dep_excel" target="_blank">

                        <input type="text" name="datadeps" id="datadeps" hidden/>
                        <input type="text" name="tgltutup" value="`+dateClose+`" hidden/>
                        
                        <button type="button" name="create_excel_dep" id="create_excel_dep" class="btn btn-primary">Export To Excel</button></form></td></table>`);

            $("#headertable").html(`                
                            <tr>
                                <td></td>
                                <td>Tanggal</td>
                                <td>Nama</td>
                                <td>Nilai Peroleh</td>
                                <td>Nilai Penyusutan</td>
                                <td>Nilai Asset</td>
                            </tr>
                        `);
            $.ajax({
                    type: 'post',
                    url: '?page=lap_dep',
                    dataType:'json',
                    data: 'q=' + dateClose,
                    success: function(value) {
                    for(var i = 0 ;i < value.length; i++){
                        records += `<tr>
                                    <td>`+ no++ +`</td>
                                    <td>`+value[i]["tgl_asset"]+`</td>
                                    <td>`+value[i]["nama_asset"]+`</td>
                                    <td>Rp.`+convertToRupiah(value[i]["nilai_asset"])+`,-</td>
                                    <td>Rp.`+value[i][2]+`,-</td>
                                    <td>Rp.`+value[i][0]+`,-</td>
                                </tr>`;
                        totalAsset = convertToAngka(value[i][0]) + totalAsset;
                    }    
                                
                        records += `<tr>
                                        <td  colspan="4"></td>
                                        <td>Total Asset</td>
                                        <td>Rp.`+convertToRupiah(totalAsset)+`,-</td>
                                    </tr>
                                    `;

                        $("#isidata").html(records);
                    }
                });
            
            document.getElementById("tabel-laporan").classList.remove('none');
            if(myChart!=null){
                myChart.destroy();
            }
            if(myChart2!=null){
                myChart2.destroy();
            }
            
    }

    function view_lap_sell(){
        var status = document.getElementById('status').value;
        var dateFirst = document.getElementById('startdate').value;
        var dateLast = document.getElementById('enddate').value;
        var data = status +","+dateFirst+","+dateLast;
        $.ajax({
                type: 'post',
                url: '?page=view-laporan',
                dataType:'json',
                data: 'q=' + data,
                success: function (json) {
                    $("#buttonCetak").html(`<table><td><form method="POST" id="make_pdf" action="?page=lap_sell_pdf" target="_blank">
                        <input type="text" name="chartpie" id="chartpie" hidden/>
                        <input type="text" name="chartgraph" id="chartgraph" hidden/>
                        <input type="text" name="stts" id="stts" value="`+status+`" hidden/>
                        <input type="text" name="startdate" value="`+dateFirst+`" hidden/>
                        <input type="text" name="enddate" value="`+dateLast+`" hidden/>
                        <button type="button" name="create_pdf" id="create_pdf" class="btn btn-primary">Lihat PDF</button></form></td><td>||</td><td>
                        <form method="POST" id="make_excel" action="?page=lap_sell_excel" target="_blank">
                        <input type="text" name="chartpie" id="chartpiex" hidden/>
                        <input type="text" name="chartgraph" id="chartgraphx" hidden/>
                        <input type="text" name="stts" id="sttsx" value="`+status+`" hidden/>
                        <input type="text" name="startdate" value="`+dateFirst+`" hidden/>
                        <input type="text" name="enddate" value="`+dateLast+`" hidden/>
                        <button type="button" name="create_excel" id="create_excel" class="btn btn-primary">Export To Excel</button></form></td></table>`);

                    $("#headertable").html(`                
                            <tr>
                                <td></td>
                                <td>Tanggal Penjualan</td>
                                <td>Nama</td>
                                <td>Seri</td>
                                <td>Jenis</td>
                                <td>Merk</td>
                                <td>Tipe</td>
                                <td>Speksifikasi</td>
                                <td>Nilai</td>
                            </tr>
                        `);

                          var tgl = [];
                          var terjual = [];  
                          var tgl_temp = "";
                          var stts_jual = [0,0];
                          var no = 1;
                          var record;
                          for(var i = 0; i < json.length;i++){
                            record +=`                
                                <tr>
                                    <td>`+ no++ +`</td>
                                    <td>`+json[i]['tgl_penjualan']+`</td>
                                    <td>`+json[i]['nama_asset']+`</td>
                                    <td>`+json[i]['no_seri_asset']+`</td>
                                    <td>`+json[i]['jenis_asset']+`</td>
                                    <td>`+json[i]['merk_asset']+`</td>
                                    <td>`+json[i]['type_asset']+`</td>
                                    <td>`+json[i]['spek_asset']+`</td>
                                    <td>Rp.`+convertToRupiah(json[i]['nilai_asset'])+`,-</td>
                                </tr>
                            `;
                            $("#isidata").html(record);

                            if (json[i]['tgl_penjualan'] == tgl_temp) {
                                terjual[i-1] = terjual[i-1] + 1;
                            }else{
                                terjual.push(1);
                                tgl_temp = json[i]['tgl_penjualan']; 
                                tgl.push(json[i]['tgl_penjualan']);
                            }

                            if (json[i]['status_penjualan'] == "lelang") {
                                stts_jual[0] = stts_jual[0] + 1;
                            }else{
                                stts_jual[1] = stts_jual[1] + 1;
                            }
                        }

                   document.getElementById("tabel-laporan").classList.remove('none');

                    var labell = ["Lelang","Pra-Lelang"];
                    // Ini Chart
                    chart_pie(labell,stts_jual);
                    chart_bar(tgl,terjual);                  
                    // Akhir Chart
                }
            });
    }
        
    function view_lap_res(){
                var tglawal = document.getElementById('tglawal').value;
                var tglakhir = document.getElementById('tglakhir').value;
                $.ajax({
                    type: 'post',
                    url: '?page=data_pinjam',
                    dataType:'json',
                    data: {
                        "tglawal":tglawal,
                        "tglakhir": tglakhir
                    },
                    success: function(json) {
                        $("#buttonCetak").html(`<table><td><form method="POST" id="form_res_pdf" action="?page=view_pdf_res" target="_blank">
                            <input type="text" name="data_res" id="data_res" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_res_pdf" id="btn_res_pdf" class="btn btn-primary">Lihat PDF</button></form></td><td>||</td><td>
                            <form method="POST" id="form_res_xcel" action="?page=view_xcel_res" target="_blank">
                            <input type="text" name="data_res" id="data_resX" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_res_xcel" id="btn_res_xcel" class="btn btn-primary">Export To Excel</button></form></td></table>`);

                    $("#headertable").html(`                
                            <tr>
                                <td></td>
                                <td>Tanggal Pengembalian</td>
                                <td>Nama Peminjam</td>
                                <td>Departement</td>
                                <td>Jabatan</td>
                                <td>Nama Asset</td>
                                <td>Nilai Asset</td>
                                <td>Jenis Asset</td>
                                <td>Merk Asset</td>
                                <td>Tipe Asset</td>
                                <td>Speksifikasi Asset</td>
                            </tr>
                        `);

                        var no = 1;
                        var record;
                        for(var i = 0; i < json.length;i++){
                                record +=`                
                                    <tr>
                                        <td>`+ no++ +`</td>
                                        <td>`+json[i]['periode_pinjam']+`</td>
                                        <td>`+json[i]['nama_user']+`</td>
                                        <td>`+json[i]['departement_user']+`</td>
                                        <td>`+json[i]['jabatan_user']+`</td>
                                        <td>`+json[i]['nama_asset']+`</td>
                                        <td>Rp.`+convertToRupiah(json[i]['nilai_asset'])+`,-</td>
                                        <td>`+json[i]['jenis_asset']+`</td>
                                        <td>`+json[i]['merk_asset']+`</td>
                                        <td>`+json[i]['type_asset']+`</td>
                                        <td>`+json[i]['spek_asset']+`</td>
                                    </tr>
                                `;
                        }
                            $("#isidata").html(record);
                            document.getElementById("tabel-laporan").classList.remove('none');
                            if(myChart!=null){
                                myChart.destroy();
                            }
                            if(myChart2!=null){
                                myChart2.destroy();
                            }
                    }
            });
    }

    function view_lap_gdg(){
                var tglawal = document.getElementById('tglawalGdg').value;
                var tglakhir = document.getElementById('tglakhirGdg').value;
                $.ajax({
                    type: 'post',
                    url: '?page=data_gdg',
                    dataType:'json',
                    data: {
                        "tglawal":tglawal,
                        "tglakhir": tglakhir
                    },
                    success: function(json) {

                    $("#headertable").html(`                
                            <tr>
                                <td></td>
                                <td>Nama Asset</td>
                                <td>Jenis Asset</td>
                                <td>Merk Asset</td>
                                <td>Tipe Asset</td>
                                <td>Speksifikasi Asset</td>
                                <td>Keterangan</td>
                                <td>Nilai Asset</td>
                            </tr>
                        `);

                        var jenis_asset = [];
                        var jmlassetbyjenis = [];  
                        var jenis_temp = "";
                        var stts_jual = [0,0];
                        var no = 1;
                        var record;
                        var totalAsset = 0;
                        for(var i = 0; i < json.length;i++){
                                record +=`                
                                    <tr>
                                        <td>`+ no++ +`</td>
                                        <td>`+json[i]['nama_asset']+`</td>
                                        <td>`+json[i]['jenis_asset']+`</td>
                                        <td>`+json[i]['merk_asset']+`</td>
                                        <td>`+json[i]['type_asset']+`</td>
                                        <td>`+json[i]['spek_asset']+`</td>
                                        <td>`+json[i]['deskripsi_gudang']+`</td>
                                        <td>Rp.`+convertToRupiah(json[i]['nilai_asset'])+`,-</td>
                                    </tr>
                                `;

                                totalAsset = parseInt(json[i]['nilai_asset']) + totalAsset;

                                if (json[i]['jenis_asset'] == jenis_temp) {
                                    jmlassetbyjenis[i-1] = jmlassetbyjenis[i-1] + 1;
                                }else{
                                    jmlassetbyjenis.push(1);
                                    jenis_temp = json[i]['jenis_asset']; 
                                    jenis_asset.push(json[i]['jenis_asset']);
                                }
                        }
                            record += `
                            <tr>
                                <td  colspan="6"></td>
                                <td>Total Asset</td>
                                <td>Rp.`+convertToRupiah(totalAsset)+`,-</td>
                            </tr>
                            `;

                            $("#buttonCetak").html(`<table><td><form method="POST" id="form_gdg_pdf" action="?page=view_pdf_gdg" target="_blank">
                            <input type="text" name="chartpie_gdg" id="chartpie_gdg" hidden/>
                            <input type="text" name="data_gdg" id="data_gdg" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_gdg_pdf" id="btn_gdg_pdf" class="btn btn-primary">Lihat PDF</button></form></td><td>||</td><td>
                            <form method="POST" id="form_gdg_xcel" action="?page=view_xcel_gdg" target="_blank">
                            <input type="text" name="dataJns[]" value="`+jenis_asset+`" id="dataJns" hidden/>
                            <input type="text" name="dataJns2[]" value="`+jmlassetbyjenis+`" id="dataJnss" hidden/>
                            <input type="text" name="data_gdg" id="data_gdgX" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_gdg_xcel" id="btn_gdg_xcel" class="btn btn-primary">Export To Excel</button></form></td></table>`);

                            $("#isidata").html(record);
                            document.getElementById("tabel-laporan").classList.remove('none');
                            document.getElementById("myCharts").classList.remove('none');
                            if(myChart!=null){
                                myChart.destroy();
                            }
                            if(myChart2!=null){
                                myChart2.destroy();
                            }
                            chart_pie(jenis_asset,jmlassetbyjenis);
                    }
            });
    }

    function view_lap_main(){
                var tglawal = document.getElementById('tglawalMain').value;
                var tglakhir = document.getElementById('tglakhirMain').value;
                $.ajax({
                    type: 'post',
                    url: '?page=data_main',
                    dataType:'json',
                    data: {
                        "tglawal":tglawal,
                        "tglakhir": tglakhir
                    },
                    success: function(json) {
                        
                         $("#buttonCetak").html(`<table><td><form method="POST" id="form_main_pdf" action="?page=view_pdf_main" target="_blank">
                            <input type="text" name="data_main" id="data_main" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_main_pdf" id="btn_main_pdf" class="btn btn-primary">Lihat PDF</button></form></td><td>||</td><td>
                            <form method="POST" id="form_main_xcel" action="?page=view_xcel_main" target="_blank">
                            <input type="text" name="data_main" id="data_mainX" hidden/>
                            <input type="text" name="tglawal" value="`+tglawal+`" hidden/>
                            <input type="text" name="tglakhir" value="`+tglakhir+`" hidden/>
                            <button type="button" name="btn_main_xcel" id="btn_main_xcel" class="btn btn-primary">Export To Excel</button></form></td></table>`);

                    $("#headertable").html(`                
                            <tr>
                                <td></td>
                                <td>Tanggal Perbaikan</td>
                                <td>Nama Asset</td>
                                <td>Jenis Asset</td>
                                <td>Merk Asset</td>
                                <td>Tipe Asset</td>
                                <td>Speksifikasi Asset</td>
                                <td>Keterangan Perbaikan</td>
                            </tr>
                        `);

                        var no = 1;
                        var record;
                        for(var i = 0; i < json.length;i++){
                                record +=`                
                                    <tr>
                                        <td>`+ no++ +`</td>
                                        <td>`+json[i]['periode_maintenance']+`</td>
                                        <td>`+json[i]['nama_asset']+`</td>
                                        <td>`+json[i]['jenis_asset']+`</td>
                                        <td>`+json[i]['merk_asset']+`</td>
                                        <td>`+json[i]['type_asset']+`</td>
                                        <td>`+json[i]['spek_asset']+`</td>
                                        <td>`+json[i]['deskripsi_maintenance']+`</td>
                                    </tr>
                                `;
                        }
                            $("#isidata").html(record);
                            document.getElementById("tabel-laporan").classList.remove('none');
                            if(myChart!=null){
                                myChart.destroy();
                            }
                            if(myChart2!=null){
                                myChart2.destroy();
                            }
                    }
            });
    }



    function chart_pie(label,data){
        if(myChart2!=null){
            myChart2.destroy();
        }

        var ctxs = document.getElementById('myCharts');
        myChart2 = new Chart(ctxs, {
            type: 'pie',
            data: {
                labels: label,
                datasets: [{
                    label: 'Laporan',
                    data: data,
                    backgroundColor: ['blue','red'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },animation :{
                    onComplete : donepie
                }
            }
        });
    }

    function chart_bar(label,data){
        if(myChart!=null){
            myChart.destroy();
        }
        var ctx = document.getElementById('myChart');
        myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Penjualan',
                                data: data,
                                borderColor: 'aqua',
                                backgroundColor: 'aqua',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },animation :{
                                onComplete : donebar
                            }
                        }
                    });
    }

    function donebar(){
        urlgraph=myChart.toBase64Image();
    }

    function donepie(){
        urlpie=myChart2.toBase64Image();
    }

    function opt_laporan() {
        $('select#laporan').change(function () {
            var lap = $("option:selected", this).val();
            if (lap == "dep") {
                document.getElementById("list-dep").classList.remove('none');
                document.getElementById("list-sell").classList.add('none');
                document.getElementById("list-res").classList.add('none');
                document.getElementById("list-gdg").classList.add('none');
                document.getElementById("list-main").classList.add('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
            } else if (lap == "sell") {
                document.getElementById("list-sell").classList.remove('none');
                document.getElementById("list-dep").classList.add('none');
                document.getElementById("list-res").classList.add('none');
                document.getElementById("list-gdg").classList.add('none');
                document.getElementById("list-main").classList.add('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
            } else if (lap == "res") {
                document.getElementById("list-res").classList.remove('none');
                document.getElementById("list-dep").classList.add('none');
                document.getElementById("list-sell").classList.add('none');
                document.getElementById("list-gdg").classList.add('none');
                document.getElementById("list-main").classList.add('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
            } else if (lap == "gdg") {
                document.getElementById("list-gdg").classList.remove('none');
                document.getElementById("list-dep").classList.add('none');
                document.getElementById("list-sell").classList.add('none');
                document.getElementById("list-res").classList.add('none');
                document.getElementById("list-main").classList.add('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
            } else if (lap == "main") {
                document.getElementById("list-main").classList.remove('none');
                document.getElementById("list-dep").classList.add('none');
                document.getElementById("list-sell").classList.add('none');
                document.getElementById("list-res").classList.add('none');
                document.getElementById("list-gdg").classList.add('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
            } else {
                document.getElementById("list-dep").classList.remove('none');
                document.getElementById("list-sell").classList.remove('none');
                document.getElementById("list-res").classList.remove('none');
                document.getElementById("list-gdg").classList.remove('none');
                document.getElementById("list-main").classList.remove('none');
                document.getElementById("tabel-laporan").classList.remove('none');
                document.getElementById("list-dep").classList.add('none');
                document.getElementById("list-sell").classList.add('none');
                document.getElementById("list-res").classList.add('none');
                document.getElementById("list-gdg").classList.add('none');
                document.getElementById("list-main").classList.add('none');
                document.getElementById("tabel-laporan").classList.add('none');
                document.getElementById("myChart").classList.add('none');
                document.getElementById("myCharts").classList.add('none');
                //document.getElementById("bayar").required = false;
            }
        });
    }

    $(document).ready(function () {
        opt_laporan();
        $('#buttonCetak').on('click','#create_pdf',function(){
            $('#chartpie').val(urlpie);
            $('#chartgraph').val(urlgraph);
            $('#make_pdf').submit();
        });
        $('#buttonCetak').on('click','#create_excel',function(){
            $('#chartpiex').val(urlpie);
            $('#chartgraphx').val(urlgraph);
            $('#make_excel').submit();
        });
        $('#buttonCetak').on('click','#lap_dep',function(){
            $('#datadep').val($('#view_report').html());
            $('#lap_dep').submit();
        });
        $('#buttonCetak').on('click','#create_excel_dep',function(){
            $('#datadeps').val($('#view_report').html());
            $('#make_excel_dep').submit();
        });
        $('#buttonCetak').on('click','#btn_gdg_pdf',function(){
            $('#chartpie_gdg').val(urlpie);
            $('#data_gdg').val($('#view_report').html());
            $('#form_gdg_pdf').submit();
        });
        $('#buttonCetak').on('click','#btn_gdg_xcel',function(){
            $('#data_gdgX').val($('#view_report').html());
            $('#form_gdg_xcel').submit();
        });
        $('#buttonCetak').on('click','#btn_main_pdf',function(){
            $('#data_main').val($('#view_report').html());
            $('#form_main_pdf').submit();
        });
        $('#buttonCetak').on('click','#btn_main_xcel',function(){
            $('#data_mainX').val($('#view_report').html());
            $('#form_main_xcel').submit();
        });
        $('#buttonCetak').on('click','#btn_res_pdf',function(){
            $('#data_res').val($('#view_report').html());
            $('#form_res_pdf').submit();
        });
        $('#buttonCetak').on('click','#btn_res_xcel',function(){
            $('#data_resX').val($('#view_report').html());
            $('#form_res_xcel').submit();
        });
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan
            <small>Inforamsi Dari Semua Laporan</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pilih Laporan</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Laporan</label>
                            <select id="laporan" class="form-control" name="laporan" required="" autofocus="">
                                <option value="none">-- Pilih Laporan --</option>
                                <option value="dep">Depresiasi</option>
                                <option value="sell">Penjualan</option>
                                <option value="res">Peminjaman</option>
                                <option value="gdg">Gudang</option>
                                <option value="main">Maintenance</option>
                            </select>
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">

                <div id="list-dep" class="box box-primary none">
                    <div class="box-header">
                        <h3 class="box-title">Search Detail Laporan</h3>
                    </div><!-- /.box-header -->

                        <div class="box-body">
                            <div id="periode" class="form-group">
                                <label for="exampleInputEmail1">Periode Laporan</label>
                            </div>
                            <div id="periode1" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxBesar">Tanggal Penutupan Laporan</label>
                                    <input type="text" name="dateClose" id="dateClose" class="form-control datepicker" placeholder="End Date" required="">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="view_lap_dep()">Lihat Laporan </button>
                        </div>
                        
                </div><!-- /.box -->

                <div id="list-sell" class="box box-primary none">
                    <div class="box-header">
                        <h3 class="box-title">Search Detail Laporan</h3>
                    </div><!-- /.box-header -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status Penjualan</label>
                                <select id="status" name="status" class="form-control" required="" autofocus="">
                                    <option value="semua">Semua</option>
                                    <option value="pralelang">Pra-Lelang</option>
                                    <option value="lelang">Lelang</option>
                                </select>
                            </div>
                            <div id="periode" class="form-group">
                                <label>Periode Laporan</label>
                            </div>
                            <div id="periode1" class="col-md-6">
                                <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input type="text" id="startdate" name="startdate" class="form-control datepicker" placeholder="Start Date" required="">
                                </div>
                            </div>
                            <div id="periode2" class="col-md-6">
                                <div class="form-group">
                                    <label>Ke Tanggal</label>
                                    <input type="text" id="enddate" name="enddate" class="form-control datepicker" placeholder="End Date" required="">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="view_lap_sell()">Lihat Laporan </button>
                        </div>
                        
                </div><!-- /.box -->

                
                
                <div id="list-res" class="box box-primary none">
                    <div class="box-header">
                        <h3 class="box-title">Search Detail Laporan</h3>
                    </div><!-- /.box-header -->
                    
                        <div class="box-body">
                            <div id="periode" class="form-group">
                                <label for="exampleInputEmail1">Periode Laporan</label>
                            </div>
                            <div id="periode1" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxBesar">Dari Tanggal</label>
                                    <input type="text" name="tglawal" id="tglawal" class="form-control datepicker" placeholder="Start Date" required="">
                                </div>
                            </div>
                            <div id="periode2" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxKecil">Ke Tanggal</label>
                                    <input type="text" name="tglakhir" id="tglakhir" class="form-control datepicker" placeholder="End Date" required="">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="view_lap_res()">Lihat Laporan</button>
                        </div>
            
                </div><!-- /.box -->
                
               
                <div id="list-gdg" class="box box-primary none">
                    <div class="box-header">
                        <h3 class="box-title">Search Detail Laporan</h3>
                    </div><!-- /.box-header -->

                        <div class="box-body">
                            <div id="periode" class="form-group">
                                <label for="exampleInputEmail1">Periode Laporan</label>
                            </div>
                            <div id="periode1" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxBesar">Dari Tanggal</label>
                                    <input type="text"  id="tglawalGdg" class="form-control datepicker" placeholder="Start Date" required="">
                                </div>
                            </div>
                            <div id="periode2" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxKecil">Ke Tanggal</label>
                                    <input type="text" id="tglakhirGdg" class="form-control datepicker" placeholder="End Date" required="">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="view_lap_gdg()">Lihat Laporan</button>
                        </div>
                        
                </div><!-- /.box -->



                <div id="list-main" class="box box-primary none">
                    <div class="box-header">
                        <h3 class="box-title">Search Detail Laporan</h3>
                    </div><!-- /.box-header -->

                        <div class="box-body">
                            <div id="periode" class="form-group">
                                <label for="exampleInputEmail1">Periode Laporan</label>
                            </div>
                            <div id="periode1" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxBesar">Dari Tanggal</label>
                                    <input type="text" id="tglawalMain" class="form-control datepicker" placeholder="Start Date" required="">
                                </div>
                            </div>
                            <div id="periode2" class="col-md-6">
                                <div class="form-group">
                                    <label for="InputBoxKecil">Ke Tanggal</label>
                                    <input type="text" id="tglakhirMain" class="form-control datepicker" placeholder="End Date" required="">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="view_lap_main()">Lihat Laporan </button>
                        </div>
                        
                </div><!-- /.box -->

            </div><!--/.col (right) -->
            
            
            <div class="col-md-12">
                <!-- Tampilan Laporan -->
                <div id="tabel-laporan" class="box box-warning none">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body" id="data">
                            <canvas id="myChart" width="10"></canvas>
                            <canvas id="myCharts" width="10"></canvas>
                            <img id="chartImg">
                            
                            <div class="box-body table-responsive no-padding">
                                <table id="view_report" class="table table-hover">
                                    <thead id="headertable"></thead>
                                    <tbody id="isidata"></tbody>
                                </table>
                                <div id="buttonCetak"></div>
                            </div><!-- /.box-body -->
                    
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->