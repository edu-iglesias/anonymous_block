<!DOCTYPE html>
<?php 
	include('dbconnect.php');

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Everlasting sew-n-wearhaus</title>

  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
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
					<li class="dropdown">
                        <a href="login.php" >Login </a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    
        

    <div class="row text-center">
<br><br><h2>SKIRT</h2><br><br><br>

			<?php 
				$querry = mysql_query("SELECT * FROM products where category=4");
				while($rows = mysql_fetch_assoc($querry))
				{
						$id = $rows['id'];
						$name = $rows['name'];
						$price = $rows['price'];
						$image = $rows['image'];
						
			?>
            <div class="col-lg-3 col-md-6 hero-feature">
                <div class="thumbnail">
					<div>
                    <img src="image/products/<?php echo $image; ?>" alt="" width="225px" height="225px">
                    </div>
					<div class="caption">
                        <h3><?php echo $name;?></h3>
                        <p><?php echo "Php " . $price;?></p>
						
                   
                    </div>
                </div>
            </div>
			<?php } ?>
            
        </div>
 
 
 
    <!-- /.section -->
	
   <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
