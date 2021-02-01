<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Account
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
                        <h3 class="box-title">Form Edit Account</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="?page=update-acc" method="POST" enctype='multipart/form-data'>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode Account</label>
                                <input type="text" name="kda" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $acc->kd_acc; ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="a" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $acc->email_acc; ?>" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="b" class="form-control" id="exampleInputPassword1" placeholder="Input To Change Password Or Let It Blank">
                            </div>
                            <div class="form-group">
                                <label>Level Account</label>
                                <select class="form-control" name="g">
                                    <?php if ($acc->level_acc == "superadmin") { ?>
                                        <option value='superadmin'>Super Admin</option>
                                        <option value='admin'>Admin</option>
                                    <?php } else { ?>
                                        <option value='admin'>Admin</option>
                                        <option value='superadmin'>Super Admin</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Full Name</label>
                                <input type="text" name="c" class="form-control" id="exampleInputPassword1" placeholder="Full Name" value="<?php echo $acc->fullname_dacc; ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">GenderP</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="d" id="optionsRadios1" value="m" <?php if ($acc->gender_dacc == "m") {
                                        echo "checked";
                                    } ?>>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="d" id="optionsRadios1" value="f" <?php if ($acc->gender_dacc == "f") {
                                        echo "checked";
                                    } ?>>
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">No Tlp / HP</label>
                                <div class="input-group">
                                    <span class="input-group-addon">62</span>
                                    <input type="number" name="e" value="<?php echo $acc->tlp_dacc; ?>" class="form-control" id="exampleInputPassword1" placeholder="12345678900" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea class="form-control" name="f" rows="3" placeholder="Enter Full Address" required=""><?php echo $acc->address_dacc; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Photo Profile</label>
                                <input type="file" name="fupload" id="exampleInputFile">
                                <p class="help-block">jpg, jpeg, png.</p>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Are You Sure Want To Save ?');">Update </button>
                            <button type="button" class="btn" onclick="document.location.href = '?page=account'">Back </button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->


            
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->