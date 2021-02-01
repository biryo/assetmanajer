<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Account
            <small>Create New</small>
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
                        <h3 class="box-title">Form Create New Account</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="?page=save-acc" method="POST" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="a" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="b" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Retype Password</label>
                                <input type="password" name="b2" class="form-control" id="exampleInputPassword1" placeholder="Retype Password" required="">
                            </div>
                        </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->


            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Level Account</label>
                            <select class="form-control" name="g" required="">
                                <option value="">Level Account</option>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Super Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Full Name</label>
                            <input type="text" name="c" class="form-control" id="exampleInputPassword1" placeholder="Full Name" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">GenderP</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="d" id="optionsRadios1" value="m" checked required="">
                                    Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="d" id="optionsRadios1" value="f" required="">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Tlp / HP</label>
                            <div class="input-group">
                                <span class="input-group-addon">62</span>
                                <input type="number" name="e" class="form-control" id="exampleInputPassword1" placeholder="12345678900" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <textarea class="form-control" name="f" rows="3" placeholder="Enter Full Address" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Photo Profile</label>
                            <input type="file" name="fupload" id="exampleInputFile">
                            <p class="help-block">jpg, jpeg, png.</p>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Save ?');">Save </button>
                        <button type="button" class="btn" onclick="document.location.href = '?page=account'">Back </button>
                    </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->