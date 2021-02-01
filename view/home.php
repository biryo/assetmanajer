<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $other->jual;?></h3>
                        <p>Penjualan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <a href="?page=penjualan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $other->pinjam;?><sup style="font-size: 20px"></sup></h3>
                        <p>Peminjaman</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-gavel"></i>
                    </div>
                    <a href="?page=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $other->gudang;?></h3>
                        <p>Gudang</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-truck"></i>
                    </div>
                    <a href="?page=gudang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $other->mt;?></h3>
                        <p>Maintenance</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-wrench"></i>
                    </div>
                    <a href="?page=maintenance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable"></section>
        </div>
</div><!-- /.box -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
</body>