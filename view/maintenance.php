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
            Maintenance
            <small>List Of All Maintenance</small>
        </h1>
        <ol class="breadcrumb">
            <li><button class="btn btn-info" type="button" onclick="document.location.href='?page=create-maintenance'">Create New Maintenance</button></li>
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
                                <th>Periode</th>
                                <th>No Seri</th>
                                <th>Nama Asset</th>
                                <th>Nilai (Rp.)</th>
                                <th>Merk</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                            <?php  $maintenance->view_maintenance();?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->