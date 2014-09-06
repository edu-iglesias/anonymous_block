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
	if(isset($_POST['submit'])){
					
                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    
					$password = $_POST['pass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
					$passs = sha1($password);
					$errorCheck = 0;
					$fnameCheck;
					$lnameCheck;
					
					$passwordCheck;
					$success;
					
					if ($errorCheck == 0) {
            $_SESSION['pass'] = mysql_real_escape_string(trim($_POST["pass"], "/\'\"\;"));
            $_SESSION['lastname'] = mysql_real_escape_string(trim($_POST["lname"], "/\'\"\;"));
            $_SESSION['firstname'] = mysql_real_escape_string(trim($_POST["fname"], "/\'\"\;"));
           
            $passs = sha1($password);
		
					$query = "UPDATE accounts set lname='$lastname',fname='$firstname',password='$passs',address='$address',contact_no='$contactno' WHERE user_id = $id";
                    mysql_query($query) or die(mysql_error());
					?><br>
					 <div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
 <center> <strong>Well done!</strong> Success !.</a></center>
</div>
					<?php
                }
				else{?>
				
					<br>								 
		<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 <center> <strong>Invalid Input.</strong> </center>
</div>
				<?php
				}
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product Gallery <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="portfolio-1-col.html">1 Polo</a>
                            </li>
                            <li><a href="portfolio-2-col.html">2 Pants</a>
                            </li>
                            <li><a href="portfolio-3-col.html">3 Blouse</a>
                            </li>
                            <li><a href="portfolio-4-col.html">4 Skirt</a>
                            </li>
                            <li><a href="portfolio-item.html">5 PE T-Shirt</a>
                            </li>
                        </ul>
                    </li>

					<li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['fname'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="editprofile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="orders.php"><i class="fa fa-table"></i> Orders</a></li>
				 <li><a href="cart.php"><i class="fa fa-table"></i> Cart</a></li>
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
				$sql = "SELECT * FROM accounts WHERE user_id = $id";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
			?>
			 <form class="form-horizontal" role="form" action="" method="post" > 
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">First Name</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="fname" class="form-control" id="description"  pattern="[a-zA-z]+([ '-][a-zA-Z]+)*"title="Only letters, spaces, hyphens, and apostrophes are allowed." required value="<?php echo $row['fname']; ?>"> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Last Name</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="lname" class="form-control" id="description"  pattern="[a-zA-z]+([ '-][a-zA-Z]+)*"title="Only letters, spaces, hyphens, and apostrophes are allowed." required value="<?php echo $row['lname']; ?>"> 
					</div> 
                </div>
				<br>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Password</label> 
                    <div class="col-sm-10"> 
                        <input type="password" name="pass" class="form-control" id="description" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" value="<?php echo $row['password']; ?>"> 
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
                        <button type="submit" name="submit" class="btn btn-success">UPDATE</button> 
                    </div> 
                </div>
            </form>
        </div>
			
   
    
   

    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>

</body>

</html>
