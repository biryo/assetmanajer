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
            Account
            <small>List Of All Account</small>
        </h1>
        <ol class="breadcrumb">
            <li><button class="btn btn-info" type="button" onclick="document.location.href='?page=create-acc'">Create New Account</button></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                        <form method="POST" action="?page=search-account">
                                <div class="input-group margin">
                                    <input name="id" id="typeahead" type="text" class="form-control" autocomplete="off" spellcheck="false" placeholder="Search Here . . ." autofocus="">
                                    <button type="submit" style="opacity: 0">
                                </div>
                        </form>
                    </div> -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>Email Account</th>
                                <th>Full Name</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            <?php $acc->view_account(); ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->