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
        $('input#typeget').typeahead({
            name: 'typeget',
            remote: '?page=list-user&key=%QUERY',
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
    
    function find_user() {
        $('input#typeget').focusin(function() {
            $.ajax({
                type: 'post',
                url: '?page=get-data-user',
                data: 'q=' + $(this).val(),
                success: function (value) {
                    var data = value.split("::");
                    var nik = data[0];
                    var nama = data[1];
                    var dep = data[2];
                    var jab = data[3];
                    $('#nik').val(nik);
                    $('#namauser').val(nama);
                    $('#dep').val(dep);
                    $('#jab').val(jab);
                }
            });
        });
    }

    $(document).ready(function () {
        hint();
        find_asset();
        find_user();
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peminjaman
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <form role="form" action="?page=update-peminjaman" method="POST" enctype='multipart/form-data'>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Form Edit Peminjaman</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Cari User</label>
                                <div class="col-md-12">
                                    <input type="text" name="keyusr" id="typeget" class="form-control" placeholder="Masukan NIK User" autofocus="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="hidden" name="id" value="<?php echo $pinjam->id;?>">
                                <input type="number" name="a" value="<?php echo $pinjam->nik;?>" id="nik" class="form-control" placeholder="16 Digit NIK" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="b" value="<?php echo $pinjam->namauser;?>" id="namauser" class="form-control" placeholder="Masukan Nama Lengkap" required="">
                            </div>
                            <div class="form-group">
                                <label>Departement</label>
                                <input type="text" name="c" value="<?php echo $pinjam->departement;?>" id="dep" class="form-control" placeholder="Masukan Departement" required="">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="d" value="<?php echo $pinjam->jabatan;?>" id="jab" class="form-control" placeholder="Masukan Jabatan" required="">
                            </div>
                            <div class="form-group">
                                <label>Periode Peminjaman</label>
                                <input type="text" name="tgl" value="<?php echo $pinjam->tgl;?>" title="dd-mm-yyyy" min="0" class="form-control datepicker" placeholder="Masukan Periode Peminjaman" required="">
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
                                    <input type="text" name="key" id="typeahead" class="form-control" placeholder="Masukan Nama Asset">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="number" name="e" value="<?php echo $pinjam->ns;?>" id="ns" class="form-control" placeholder="Masukan No Seri" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input type="text" name="f" value="<?php echo $pinjam->nama;?>" id="nama" class="form-control" placeholder="Masukan Nama Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Nilai Asset</label>
                                <input type="text" name="g" value="<?php echo $pinjam->nilai;?>" id="nilai" class="form-control" placeholder="0" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="h" value="<?php echo $pinjam->jenis;?>" id="jenis" class="form-control" placeholder="Masukan Jenis Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="i" value="<?php echo $pinjam->merk;?>" id="merk" class="form-control" placeholder="Masukan Merk Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="j" value="<?php echo $pinjam->tp;?>" id="tp" class="form-control" placeholder="Masukan Tipe Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="k" id="spek" class="form-control" placeholder="Masukan Spesifikasi Asset" required=""><?php echo $pinjam->spek;?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Update ?');">Update </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=peminjaman'">Back </button>
                        </div>
                    </div>
                </div>
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </form>
</div><!-- /.content-wrapper -->