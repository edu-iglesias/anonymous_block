<div id="wrapper">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SB Admin</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="accounts.php"><i class="fa fa-user"></i> Accounts</a></li>
        <li class="active"><a href="order.php"><i class="fa fa-table"></i> Orders</a></li>
        <li><a href="products-cms.php"><i class="fa fa-edit"></i> Products</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right navbar-user">
        <li class="dropdown user-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " " . $_SESSION['fname'] . " "; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
            <li><a href="admin-settings.php"><i class="fa fa-user"></i>Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div>