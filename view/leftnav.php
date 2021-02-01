<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $acc->photo; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $acc->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="?page=home">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?page=account">
                    <i class="fa fa-group"></i> <span>Account</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hdd-o"></i>
                    <span>Master Data</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=asset"><i class="fa fa-circle-o"></i> Data Asset</a></li>
                    <li><a href="?page=user"><i class="fa fa-circle-o"></i> Data User</a></li>
                </ul>
            </li>
            <li>
                <a href="?page=depresiasi">
                    <i class="fa fa-bar-chart-o"></i> <span>Depresiasi</span>
                </a>
            </li>
            <li>
                <a href="?page=penjualan">
                    <i class="fa fa-money"></i> <span>Penjualan</span>
                </a>
            </li>
            <li>
                <a href="?page=peminjaman">
                    <i class="fa fa-gavel"></i> <span>Peminjaman</span>
                </a>
            </li>
            <li>
                <a href="?page=gudang">
                    <i class="fa fa-truck"></i> <span>Gudang</span>
                </a>
            </li>
            <li>
                <a href="?page=maintenance">
                    <i class="fa fa-wrench"></i> <span>Maintenance</span>
                </a>
            </li>
            
            <li>
                <a href="?page=laporan">
                    <i class="fa fa-file-o"></i> <span>Laporan</span>
                </a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>