<!DOCTYPE html>
<?php 
	include('dbconnect.php');
	$id = $_REQUEST['id'];
	
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
	
    <link href="css/modern-business.css" rel="stylesheet">

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
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="row text-center">
	<?php 
				$querry = mysql_query("SELECT * FROM category where category_id = $id");
				while($rows = mysql_fetch_assoc($querry))
				{
	?> 
	<br><br><h2><?php echo $rows['category']?> </h2><br><br><br>
	<?php } ?>

			<?php 
				$querry = mysql_query("SELECT * FROM products where category='$id'");
				while($rows = mysql_fetch_assoc($querry))
				{
						$id = $rows['id'];
						$name = $rows['name'];
						$price = $rows['price'];
						$image = $rows['image'];
						
			?>
            <div class="col-lg-3 col-md-6 hero-feature">
                <div class="thumbnail" >
				
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
 
 
            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
 
 
    <!-- /.section -->
	<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-1.10.2.js"></script>
   <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
