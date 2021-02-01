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
            Gudang
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <form role="form" action="?page=update-gudang" method="POST" enctype='multipart/form-data'>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Form Edit Gudang</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cari Asset</label>
                                <div class="col-md-12">
                                    <input type="text" name="key" id="typeahead" class="form-control" placeholder="Masukan Nama Asset">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="hidden" name="id" value="<?php echo $gudang->id;?>">
                                <input type="number" name="a" value="<?php echo $gudang->ns;?>" id="ns" class="form-control" placeholder="Masukan No Seri" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input type="text" name="b" value="<?php echo $gudang->nama;?>" id="nama" class="form-control" placeholder="Masukan Nama Asset" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Nilai Asset</label>
                                <input type="text" name="c" value="<?php echo $gudang->nilai;?>" id="nilai" class="form-control" placeholder="0" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="d" value="<?php echo $gudang->jenis;?>" id="jenis" class="form-control" placeholder="Masukan Jenis Asset" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="e" value="<?php echo $gudang->merk;?>" id="merk" class="form-control" placeholder="Masukan Merk Asset" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="f" value="<?php echo $gudang->tp;?>" id="tp" class="form-control" placeholder="Masukan Tipe Asset" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="g" id="spek" class="form-control" placeholder="Masukan Spesifikasi Asset" required="" readonly=""><?php echo $gudang->spek;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Asset Gudang</label>
                                <textarea name="h" id="spek" class="form-control" placeholder="Masukan Deskripsi Asset Di Gudang" required=""><?php echo $gudang->deskrip;?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Update ?');">Update </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=gudang'">Back </button>
                        </div>
                    </div>
                </div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </form>
</div><!-- /.content-wrapper -->