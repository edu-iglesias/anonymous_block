<!DOCTYPE html>
<?php 
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted'])){
		header("location:../login.php");
	}
	$id = $_SESSION['userid'];
	$querry = mysql_query("SELECT * FROM accounts where user_id = $id");
	while($rows = mysql_fetch_assoc($querry))
	{
			$_SESSION['fname'] = $rows['fname'];
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Charts - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/media/css/jquery.dataTables.css">
	
	<script type="text/javascript" language="javascript" src="css/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="css/media/js/jquery.dataTables.js"></script>
	<script >

		$(document).ready(function() {
			$('#example').dataTable();
		} );


	</script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
           <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="accounts.php"><i class="fa fa-user"></i> Accounts</a></li>
            <li><a href="order.php"><i class="fa fa-table"></i> Orders</a></li>
            <li><a href="products-cms.php"><i class="fa fa-edit"></i> Products</a></li>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">7 New Messages</li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
              </ul>
            </li>
       
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $_SESSION['fname'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="admin-settings.php"><i class="fa fa-user"></i>Edit Profile</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php""><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper"> 
                <div class="panel-heading"><b>Add to Products</b></div> 
			<br>
			 <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Name</label> 
                    <div class="col-sm-10"> 
                        <input type="name" name="name" class="form-control" id="description" required title="must consist of letters only."> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">description</label> 
                    <div class="col-sm-10"> 
                        <input type="description" name="description" class="form-control" id="description" required> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">price</label> 
                    <div class="col-sm-10"> 
                        <input type="number" name="price" class="form-control" id="description" required> 
					</div> 
                </div>
				<br>
               <div class="form-group">
			   
      <label for="select" class="col-lg-2 control-label">Category</label>
      <div class="col-lg-10">
        <select class="form-control" name="category">
		<?php
		$queerry = mysql_query("SELECT * FROM category");
						while($rowsssss = mysql_fetch_assoc($queerry))
					{
							$cat_id = $rowsssss['category_id'];
							$category = $rowsssss['category'];
							?>
							
          <option value="<?php echo $cat_id; ?>" name="category"><?php echo $category?></option>
        
		<?php }?>
		</select>
		
        <br>
      </div>
    </div>

				<br>
				   <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Image</label> 
                    <div class="col-sm-10"> 
                        <input type="file" name="file" id="file" required><br>
                    </div> 
                </div>
				<br>
              
				<br>
              
				<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"> 
                        <button type="submit" name="submit" class="btn btn-success">Add Products</button> 
                    </div> 
                </div>
            </form>
        </div>
        </div><!-- /.row -->      
        </div>
        </div>
		<?php
	
	if(isset($_POST['submit'])){
					//$id=$newid;
                    $name = $_POST['name'];
                    $descritption = $_POST['description'];
                    $price = $_POST['price'];
					
                    $category = $_POST['category'];  
					
						move_uploaded_file($_FILES["file"]["tmp_name"],"image/products/" . $_FILES["file"]["name"]);
						$image = mysql_real_escape_string($_FILES["file"]["name"]);
					
					
					
					$query = "INSERT INTO products set name='$name',description='$descritption',image='$image', price='$price',category='$category'";
					
					mysql_query($query) or die(mysql_error());
					
                }
    ?> 
    
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
	<script src="js/flot/jquery.flot.js"></script>
	<script src="js/flot/jquery.flot.tooltip.min.js"></script>
	<script src="js/flot/jquery.flot.resize.js"></script>
	<script src="js/flot/jquery.flot.pie.js"></script>
	<script src="js/flot/chart-data-flot.js"></script>

  </body>
</html>