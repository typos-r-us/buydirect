<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
        <li class="header">MANAGE</li>
        <li><a href="users.php"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
        <li><a href="products.php"><i class="fa fa-barcode"></i> <span>Manage Products</span></a></li>
        <li><a href="category.php"><i class="fa fa-database"></i> <span>Manage Product Categories</span></a></li>
        <li class="header">INVENTORY</li>
        <li><a href="receive_items.php"><i class="fa fa-plus-square-o"></i> <span>Receive New Items</span></a></li>
        <li><a href="write_off_items.php"><i class="fa fa-minus-square-o"></i> <span>Write Off Items</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>