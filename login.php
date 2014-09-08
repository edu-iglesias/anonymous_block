<?php
	include('dbconnect.php');
	error_reporting(0);
	session_start();
$error_id = $_REQUEST["error"];

if(isset($_POST["signup"]))
{
	header("location:Register.php");

}
else if(isset($_POST["signin"]))
{	

function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$email = clean($_POST["email"]);
	$pass = clean($_POST["password"]);
	
	$status = 1;
	$myLogin = mysql_query("SELECT * FROM accounts WHERE email = '$email' AND password = sha1('$pass') AND status = '$status' ");
	$num_rows = mysql_num_rows($myLogin);
		if($num_rows == 0)
		{
			header("location:login.php?error=1");
		}
		else
		{	
			while($query = mysql_fetch_assoc($myLogin))
			{
				$_SESSION['userid']=$query['user_id'];
				$_SESSION['accessgranted'] = true;
				$_SESSION['email'] = true;
				$_SESSION['password'] = true;
				$id = $query['usertype'];
				if($id == 0)
				{
				header("location:sb-admin/index.php");
				}else if ($id == 1)
				{
				header("location:sb-customer/index.php");
				}else if ($id == 2)
				{
				header("location:sb-customer/index.php");
				}
			}
		}
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
       <title>Everlasting sew-n-wearhaus</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
	
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
					<li class="dropdown">
                        <a href="login.php" >Login </a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<form action=""method="post">

  <h1>Log in</h1>
  <div class="inset">
	<?php if($error_id == 1) { ?>
	<center><font color="red">Invalid Email or Password!</font></center><br>
	<?php } 
	else if($error_id == 2){
	?>
	<center><font color="red">Please Login First</font></center><br>
	<?php
	}
	?>
 <p>
    <label for="email">EMAIL ADDRESS</label>
    <input type="text" name="email" id="email" style="color:#000000" required>
	<?php
	$_SESSION['email'] = mysql_real_escape_string(trim($_POST["email"], "/\'\"\;"));
	?>
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="password" style="color:#000000" required>
  </p>
 
  </div>
  
  <p class="p-container">
 
    
	<a href="Register.php" name="signup" id="signup" class="btn btn-info">Register</a>
    <input type="submit" name="signin" id="go" value="Login" class="btn btn-info">
	<!-- <input type="submit" name="reg" id="regis" value="Sign up"> -->
</form>
  </p>
<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>
</html>
