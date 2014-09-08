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
					$curpass = $_POST['currentpass'];
					$newpass = $_POST['newpass'];
					$repass = $_POST['reenterpass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
					$email = $_POST['email'];
					$errorCheck = 0;
					$fnameCheck;
					$lnameCheck;
					
					$passwordCheck;
					$success;
					$sql = "SELECT * FROM accounts WHERE user_id = $id";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
					$pword = $row['password'];
				}	
					
    
					if ($errorCheck == 0) {
					
					if($curpass == null){
						$password = $pword;
					
					}
					else if($curpass != null){
					
						if($pword == sha1($curpass)){
							if($newpass == $repass){
							
								$password = $newpass;
							}else{
							header("Location: newpass.php");
							}
						}else{
						header("Location: curpass.php");
						}
						
					}else{
						header("Location: haha.php");
					}
            $_SESSION['password'] = mysql_real_escape_string(trim($password, "/\'\"\;"));
            $_SESSION['lastname'] = mysql_real_escape_string(trim($_POST["lname"], "/\'\"\;"));
            $_SESSION['firstname'] = mysql_real_escape_string(trim($_POST["fname"], "/\'\"\;"));
           
            $password = sha1($password);
		
					$query = "UPDATE accounts set lname='$lastname',fname='$firstname',password='$password',address='$address',contact_no='$contactno' WHERE user_id = $id";
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
						<?php 
							$querryy = mysql_query("SELECT * FROM  category");
						while($rowes = mysql_fetch_assoc($querryy))
						{	
							
							
						?>
                            <li><a href="product.php?id=<?php echo $rowes["category_id"]; ?>" ><?php echo $rowes["category"]; ?></a>
                            </li>
                          
							<?php } ?>
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
                    <label for="description" class="col-sm-2 control-label">Email</label> 
                    <div class="col-sm-10"> 
                        <input type="description" name="email" class="form-control" id="description" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"title="Please enter a valid email." required value="<?php echo $row['email']; ?>"> 
					</div> 
                </div>
				<br>
					<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Password</label> 
                    <div class="col-sm-10"> 
                        <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        Change Password
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse out">
      <div class="panel-body">
		 <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Current</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="currentpass" class="form-control"  value=""> 
                    </div> 
                </div>
		  <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">New</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="newpass" class="form-control" value=""> 
                    </div> 
                </div> 
		    <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Re-enter New</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="reenterpass" class="form-control"  value=""> 
                    </div> 
                </div>
	  </div>
    </div>
  </div>
  </div>
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
