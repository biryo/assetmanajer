<body class="skin-blue">
    <!-- Loading Screen -->
    <div id="load_screen"><div id="loading">loading, Please Wait</div></div>
    <!-- End Of Load Screen -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>ASSET</b> Management</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $acc->photo;?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $acc->name;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $acc->photo;?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $acc->name;?></span> - <?php echo strtoupper($acc->level);?></span>
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <table class="table table-hover">
                          <tr><td><ol class="fa fa-fw fa-envelope"></ol></td><td><?php echo $acc->email;?></td></tr>
                          <tr><td><ol class="fa fa-fw fa-phone"></ol></td><td>+<?php echo $acc->tlp;?></td></tr>
                      </table>
                    <div class="pull-left">
                      <a href="?page=edit-acc&id=<?php echo $acc->id;?>" class="btn btn-default btn-flat">Edit Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="?page=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>