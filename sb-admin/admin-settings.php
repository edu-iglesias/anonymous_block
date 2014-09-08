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
	?>
	<br><br>
	 <div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
 <center> <strong>Well done!</strong> Change Success!.</a>.</center>
</div>

					<?php
                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
					$curpass = $_POST['currentpass'];
					$newpass = $_POST['newpass'];
					$repass = $_POST['reenterpass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
				
				
				
				$sql = "SELECT * FROM accounts WHERE user_id = $id";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
					$pword = $row['password'];
				}	
					
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
					
					$password = sha1($password);
					$query = "UPDATE accounts set lname='$lastname',fname='$firstname',email='$email',password='$password',address='$address',contact_no='$contactno' WHERE user_id = $id";
					
					mysql_query($query) or die(mysql_error());
					
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
                        <input type="name" name="fname" class="form-control" id="fname"  value="<?php echo $row['fname']; ?>"> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Last Name</label> 
                    <div class="col-sm-10"> 
                        <input type="name" name="lname" class="form-control" id="lname"  value="<?php echo $row['lname']; ?>"> 
					</div> 
                </div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Email</label> 
                    <div class="col-sm-10"> 
                        <input type="email" name="email" class="form-control" id="email" " value="<?php echo $row['email']; ?>"> 
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
                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address']; ?>"> 
                    </div> 
                </div>
				<br>
                <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Contact No.</label> 
                    <div class="col-sm-10"> 
                        <input type="number" name="contactno" class="form-control" id="contactno" value="<?php echo $row['contact_no']; ?>"> 
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