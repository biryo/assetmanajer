<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    
    function hint() {
        $('input#typeahead').typeahead({
            name: 'typeahead',
            remote: '?page=list-asset&key=%QUERY',
            limit: 10
        });
    }

        function convertToAngka(rupiah) {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }
    
    function find_asset() {
        $('input#typeahead').focusin(function() {
            
            if($('#tgl_jual').val() == ""){
                $('input#typeahead').keyup(function(){
                    if($('#tgl_jual').val() == ""){
                        alert("Masukan Tanggal Penjualan Terlebih Dahulu")
                    }
                })
                alert("Masukan Tanggal Penjualan Terlebih Dahulu")
            }else{
                $.ajax({
                    type: 'post',
                    url: '?page=get-data-asset',
                    data: 'q=' + $(this).val(),
                    success: function (value) {
                        var data = value.split("::");
                        var ns = data[0];
                        var nama = data[1];
                        var nilai = data[2];
                        var jenis = data[3];
                        var merk = data[4];
                        var tp = data[5];
                        var spek = data[6];
                        $('#ns').val(ns);
                        $('#nama').val(nama);
                        $('#nilai').val(nilai);
                        $('#jenis').val(jenis);
                        $('#merk').val(merk);
                        $('#tp').val(tp);
                        $('#spek').val(spek);

                        cal_dep();
                    }
                });
            }
        });
    }

    function cal_dep(){
        var asset = $("#nama").val();
        var nilai = $("#nilai").val();
        var tgl = $("#tgl_jual").val();
        var id = asset + "," + nilai + "," + tgl;
        if(asset && nilai){
            $.ajax({
                type: 'post',
                url: '?page=calculate-depresiasi-jual',
                data: 'q=' + id,
                success: function (value) {
                    var data = value.split("::");
                    var depresiasi = data[0];
                    if(depresiasi == ""){alert("Tanggal yang anda masukan Lebih Kecil Dari Tgl Asset, Sehingga Kolom depresiasi Tidak Muncul")}
                    $("#depresiasi").html("");
                    $("#depresiasi").append(depresiasi);
                }
            });
        }
    }


    $(document).ready(function () {
        hint();
        find_asset();
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Penjualan
            <small>Create New</small>
        </h1>
    </section>

    <!-- Main content -->
    <form role="form" action="?page=save-penjualan" method="POST" enctype='multipart/form-data'>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Form Create Penjualan</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Status Penjualan</label>
                                <select name="status" class="form-control" autofocus=""><option value="pralelang">Pra Lelang</option><option value="lelang">Lelang</option></select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tgl" title="dd-mm-yyyy" id="tgl_jual" min="0" class="form-control datepicker" placeholder="Masukan Tanggal Penjualan" required="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- general form elements -->
                    <div id="depresiasi">
                
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cari Asset</label>
                                <div class="col-md-12">
                                    <input type="text" name="key" id="typeahead" class="form-control" placeholder="Masukan Nama Asset" autofocus="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="number" name="a" id="ns" class="form-control" placeholder="Masukan No Seri" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input type="text" name="b" id="nama" class="form-control" placeholder="Masukan Nama Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Nilai Asset</label>
                                <input type="text" name="c" id="nilai" class="form-control" placeholder="0" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="d" id="jenis" class="form-control" placeholder="Masukan Jenis Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="e" id="merk" class="form-control" placeholder="Masukan Merk Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="f" id="tp" class="form-control" placeholder="Masukan Tipe Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="g" id="spek" class="form-control" placeholder="Masukan Spesifikasi Asset" required=""></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Save ?');">Save </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=penjualan'">Back </button>
                        </div>
                    </div>
                </div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </form>
</div><!-- /.content-wrapper -->