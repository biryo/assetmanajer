<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Create New</small>
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
                        <h3 class="box-title">Form Create New User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="?page=save-user" method="POST" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" name="a" class="form-control" placeholder="16 Digit NIK" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="b" class="form-control" placeholder="Masukan Nama Lengkap" required="">
                            </div>
                            <div class="form-group">
                                <label>Departement</label>
                                <input type="text" name="c" class="form-control" placeholder="Masukan Departement" required="">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="d" class="form-control" placeholder="Masukan Jabatan" required="">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Save ?');">Save </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=user'">Back </button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->