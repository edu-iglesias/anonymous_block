
       <?php
	         error_reporting(0);
	   include('dbconnect.php');
                if(isset($_POST['submit'])){
					
					
					
										
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
					$password = $_POST['pass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
					$codenum = "a123";
					$status= 0;
					$usertype=2;
					
					$errorCheck;
					$fnameCheck;
					$lnameCheck;
					
					$passwordCheck;
					$success;
					
		if ($firstname == null) {
            $fnameCheck = " *Required";
            $errorCheck = 1;
        }

        if ($lastname == null) {
            $lnameCheck = " *Required";
            $errorCheck = 1;
        }
        if ($email == null) {
            $emailCheck = " *Required";
            $errorCheck = 1;
        }
        if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) && $email != null) {
            $emailCheck = "Invalid Email";
            $errorCheck = 1;
        }
		 if (!preg_match("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$^", $password) && $password != null) {
            $passwordCheck = "Invalid Password";
            $errorCheck = 1;
        }
        if ($password == null) {
            $passwordCheck = " *Required";
            $errorCheck = 1;
        }
        if (!ctype_alpha(str_replace(' ', '', $firstname)) && $firstname != null) {
            $fnameCheck = " Invalid name";
            $errorCheck = 1;
        }
        if (!ctype_alpha(str_replace(' ', '', $lastname)) && $lastname != null) {
            $lnameCheck = " Invalid Lastname";
            $errorCheck = 1;
        }
					
		
            $passs = sha1($password);
 
                $result = mysql_query("SELECT email FROM accounts WHERE email = '$email' ");
		if(mysql_num_rows($result) > 0){
			$emailCheck = 'The email you entered is already registered.';
			$errorCheck = 1;
		}	
		
		if ($errorCheck == 0) {
            $_SESSION['pass'] = mysql_real_escape_string(trim($_POST["pass"], "/\'\"\;"));
            $_SESSION['lastname'] = mysql_real_escape_string(trim($_POST["lastname"], "/\'\"\;"));
            $_SESSION['firstname'] = mysql_real_escape_string(trim($_POST["firstname"], "/\'\"\;"));
            $_SESSION['email'] = mysql_real_escape_string(trim($_POST["email"], "/\'\"\;"));
            $passs = sha1($password);
		
	
					$query = "INSERT INTO accounts set lname='$lastname',fname='$firstname',email='$email',password='$passs',address='$address',contact_no='$contactno',status='$status',usertype='$usertype',codenum='$codenum' ";
                    mysql_query($query) or die(mysql_error());
                   ?>
				   <div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
 <center> <strong>Well done!</strong> You successfully registered. Please verify it through your email.</a>.</center>
</div>
		<?php		}
				else{?>
				
					<br>								 
		<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 <center> <strong>Invalid Input.</strong> </center>
</div>
				<?php
				}
				}
            mysql_close();
            ?>
            
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Everlasting sew-n-wearhaus</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
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
                        <a href="#"  class="dropdown" data-toggle="dropdown">Product Gallery <b class="caret"></b></a>
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
					<li class="dropdown">
                        <a href="login.php" >Login </a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
		
		

        <div class="container">
	<div class="status alert alert-success" style="display: none"></div>
            <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" > 
                <br><br>
               
                <div class="form-group" > 
                      <fieldset class="form-inline">
                    <label for="name" class="col-sm-2 control-label">Name</label> 
                    <div class="col-sm-10"> 
                            
                           <input type="text" name="firstname"class="form-control" id="name" placeholder="Enter First Name" title="Only letters, spaces, hyphens, and apostrophes are allowed." required> 
								
						
						   <input type="text" name="lastname" class="form-control" id="name" placeholder="Enter Last Name" title="Only letters, spaces, hyphens, and apostrophes are allowed."required>
								<font color="red"><b><br>
							<?php
                                            if (isset($fnameCheck) && ($lnameCheck)) {
                                                echo $fnameCheck;
                                            }
											
                                            
                                            ?> </b></font>
                    </div> 
                </fieldset>
                    
                </div>
                <div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Email</label> 
                    <div class="col-sm-10"> 
                        <input type="email" name="email" class="form-control" id="description" placeholder="Enter Email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"title="Please enter a valid email." required> 
									<?php
								if (isset($emailCheck))
											{
                                                echo $emailCheck;
                                            }
											?>
                </div>
				</div>
				<div class="form-group"> 
                    <label for="description" class="col-sm-2 control-label">Password</label> 
                    <div class="col-sm-10"> 
                        <input type="password" name="pass" class="form-control" id="description" placeholder="Enter Password" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"> 
						  <span class="help-block">password must contain atleast 8 characters with uppercase, letter, number, special character and cannot begin or end with a space.</span>
										<?php
								if (isset($passwordCheck))
											{
                                                echo $passwordCheck;
                                            }
											?>

				   </div> 
                </div>
                <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Address</label> 
                    <div class="col-sm-10"> 
                        <input type="text" name="address" class="form-control" id="price" placeholder="Enter Address" required> 
                    </div> 
                </div>
                <div class="form-group"> 
                    <label for="price" class="col-sm-2 control-label">Contact No.</label> 
                    <div class="col-sm-10"> 
                        <input type="number" name="contactno" class="form-control" id="price" placeholder="Enter Contact no" required> 
                    </div> 
                </div>
			
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" > 
					<br><br>
                        <button type="submit" name="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">REGISTER</button> 
						
						
									
    </div>
  </div>
</div>
				   </div> 
                </div>
			

            <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
        <script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   
        
        

    </body>
</html>
