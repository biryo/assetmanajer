<script>
    $(document).ready(function () {
        $('input#typeahead').typeahead({
            name: 'typeahead',
            remote: '?page=hint-account&key=%QUERY',
            limit: 10
        });
    });
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>List Of All User</small>
        </h1>
        <ol class="breadcrumb">
            <li><button class="btn btn-info" type="button" onclick="document.location.href='?page=create-user'">Create New User</button></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header"></div>-->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Departement</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                            <?php  $user->view_user();?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->