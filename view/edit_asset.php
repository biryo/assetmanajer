<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Asset
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Form Edit Asset</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="?page=update-asset" method="POST" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="hidden" name="id" value="<?php echo $asset->id;?>">
                                <input type="number" name="a" class="form-control"  value="<?php echo $asset->ns;?>" placeholder="Masukan No Seri" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input type="text" name="b" class="form-control" value="<?php echo $asset->nama;?>" placeholder="Masukan Nama Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Nilai Asset</label>
                                <input type="text" name="c" class="form-control" value="<?php echo $asset->nilai;?>" placeholder="0" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="d" class="form-control" value="<?php echo $asset->jenis;?>" placeholder="Masukan Jenis Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="e" class="form-control" value="<?php echo $asset->merk;?>" placeholder="Masukan Merk Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="f" class="form-control" value="<?php echo $asset->tp;?>" placeholder="Masukan Tipe Asset" required="">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="g" class="form-control" placeholder="Masukan Spesifikasi Asset" required=""><?php echo $asset->spek;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Peroleh</label>
                                <input type="text" name="h" title="dd-mm-yyyy" class="form-control datepicker" value="<?php echo $asset->tgl;?>" placeholder="Masukan Tanggal Asset" required="">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Update ?');">Update </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=asset'">Back </button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->