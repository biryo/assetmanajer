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
    
    function find_asset() {
        $('input#typeahead').focusin(function() {
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
                }
            });
        });
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
    <form role="form" action="?page=update-penjualan" method="POST" enctype='multipart/form-data'>
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
                                <input type="hidden" name="id" value="<?php echo $jual->id;?>">
                                <select name="status" class="form-control" autofocus=""><?php echo $jual->status;?></select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tgl" value="<?php echo $jual->tgl;?>" title="dd-mm-yyyy" min="0" class="form-control datepicker" placeholder="Masukan Tanggal Penjualan" required="">
                            </div>
                        </div>
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
                                <input type="number" name="a" value="<?php echo $jual->ns;?>" id="ns" class="form-control" placeholder="Masukan No Seri" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input type="text" name="b" value="<?php echo $jual->nama;?>" id="nama" class="form-control" placeholder="Masukan Nama Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Nilai Asset</label>
                                <input type="text" name="c" value="<?php echo $jual->nilai;?>" id="nilai" class="form-control" placeholder="0" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="d" value="<?php echo $jual->jenis;?>" id="jenis" class="form-control" placeholder="Masukan Jenis Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="e" value="<?php echo $jual->merk;?>" id="merk" class="form-control" placeholder="Masukan Merk Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="f" value="<?php echo $jual->tp;?>" id="tp" class="form-control" placeholder="Masukan Tipe Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="g" id="spek" class="form-control" placeholder="Masukan Spesifikasi Asset" required=""><?php echo $jual->spek;?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Update ?');">Update </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=penjualan'">Back </button>
                        </div>
                    </div>
                </div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </form>
</div><!-- /.content-wrapper -->