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

    <title>Everlasting sew-n-wearhaus</title>

    <!-- Bootstrap core CSS -->
	   <link href="css/style" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
	
	<link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.php">Everlasting sew-n-wearhaus</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a>
                    </li>
                    <li class="dropdown">
                        <a href="productgallery.php" class="dropdown-toggle" data-toggle="dropdown">Product Gallery <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="poloproduct.php">1 Polo</a>
                            </li>
                            <li><a href="pantsproduct.php">2 Pants</a>
                            </li>
                            <li><a href="blouseproduct.php">3 Blouse</a>
                            </li>
                            <li><a href="skirtproduct.php">4 Skirt</a>
                            </li>
                            <li><a href="peproduct.php">5 PE T-Shirt</a>
                            </li>
                        </ul>
                    </li>

					<li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['fname'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="editprofile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li><a href="orders.php"><i class="fa fa-table"></i> Orders</a></li>
				<li class="divider"></li>
                <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
      <div id="page-wrapper"> 
                <div class="panel-heading"><b>CUSTOMER ACCOUNTS</b></div> 
			<br>
			 <?php
			 
				$getid = $_REQUEST['id'];
				$sql = "SELECT * FROM accounts WHERE user_id = $getid";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
			?>
			 <form class="form-horizontal" role="form" action="" method="post" > 
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">First Name</label> 
                    <div class="col-sm-10"> 
                        <input type="description" name="fname" class="form-control" id="description"  value="<?php echo $row['fname']; ?>"> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Last Name</label> 
                    <div class="col-sm-10"> 
                        <input type="description" name="lname" class="form-control" id="description"  value="<?php echo $row['lname']; ?>"> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Email</label> 
                    <div class="col-sm-10"> 
                        <input type="description" name="email" class="form-control" id="description" " value="<?php echo $row['email']; ?>"> 
					</div> 
                </div>
				<br>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Password</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="pass" class="form-control" id="description"  value="<?php echo $row['password']; ?>"> 
                    </div> 
                </div>
				<br>
                <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Address</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="address" class="form-control" id="price" value="<?php echo $row['address']; ?>"> 
                    </div> 
                </div>
				<br>
                <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Contact No.</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="contactno" class="form-control" id="price" value="<?php echo $row['contact_no']; ?>"> 
                    </div> 
                </div>
				<br>
				<br>
                
				<?php
				}
				?>
				<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"> 
                        <button type="submit" name="submit" class="btn btn-default">UPDATE</button> 
                    </div> 
                </div>
            </form>
        </div>
        </div><!-- /.row -->

		
            
             
        </div>

        </div>
		<?php
	
	if(isset($_POST['submit'])){
					$id=$newid;
                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
					$password = $_POST['pass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
					$query = "UPDATE accounts set lname='$lastname',fname='$firstname',email='$email',password='$password',address='$address',contact_no='$contactno' WHERE user_id = $id";
					
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