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

$getid = $_REQUEST['id'];
if(isset($_POST["add"]))
{
	$prod = $_POST["hide"];	
	$par_price = $_SESSION["price"];
	$quantity = $_POST["quan"];
	$thru = $_POST["optionsRadios"];
	$price = $par_price * $quantity;
	$customer = $_SESSION['userid'];
	$size_iday = $_POST["sizes"];	

	$checkDuplicate = mysql_query("SELECT * FROM cart where customer_num = $id AND product = '$prod' and size = '$size_iday'");
	while($rows = mysql_fetch_assoc($checkDuplicate))
	{
		$prod_id = $rows['cid'];

	}
	$num_rows = mysql_num_rows($checkDuplicate);
	$_SESSION['try'] = $num_rows;
	if($num_rows != 0)
	{
		$querry = mysql_query("SELECT * FROM cart where cid='$prod_id'");
		while($rows = mysql_fetch_assoc($querry))
		{
			$prod = $rows['product'];
			$old_quantity = $rows['quantity'];
			$tprice = $rows['tprice'];
								//$price = $rows['price'];
			$image = $rows['image'];
			$name = $rows['name'];

			$new_quan = $old_quantity  + $quantity;
			$add_price = $price * $new_quan;
			$new_price = $add_price ;

		}
		$querryy = "UPDATE cart set tprice='$new_price', quantity='$new_quan' WHERE cid = $prod_id";
		mysql_query($querryy) or die(mysql_error());
		header("location:cart.php");
	}
	else
	{
		
		$queryy = "INSERT INTO cart set customer_num='$customer',product=$prod,quantity=$quantity,tprice=$price,size='$size_iday'";
		mysql_query($queryy) or die(mysql_error());
		
		echo "<script>";
		echo "alert('Product has been successfully added to cart!');";
		echo "</script>";
		header("location:cart.php?id='$num_rows'");
	} 
}
?>	


<link href="css/style" rel="stylesheet">
<link href="../css/bootstrap.css" rel="stylesheet">

<!-- Add custom CSS here -->

<link href="../css/modern-business.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

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

    
        
<div class="col-md-3">
                
                <div class="list-group">
					
					<br><br>
					<h2>Product Detail</h3>
					<form action="" method="post">
						<h3>Size</h3>
						<select name='sizes'>

						<?php 
						
						$querry = mysql_query("SELECT * FROM products where id=$getid");
						while($rows = mysql_fetch_assoc($querry))
						{	
							$category = $rows['category'];

							
							$queerry = mysql_query("SELECT * FROM sizes where category=$category");
							while($rowsssss = mysql_fetch_assoc($queerry))
							{
								$size_id = $rowsssss['size_id'];
								$sizes = $rowsssss['size'];

								if($category==1 || $category==5){
									?>

									<option value="<?php echo $size_id; ?>" name="sizess"><?php echo $sizes?></option>

									<?php
								}

								else if($rows['category']==2){
									?>
									<option value="<?php echo $size_id; ?>" name="sizess"><?php echo $sizes?></option>

									<?php
								}
								else if($rows['category']==3){
									?>
									<option value="<?php echo $size_id; ?>" name="sizess"><?php echo $sizes?></option>

									<?php
								}
								else if($rows['category']==4){
									?>
									<option value="<?php echo $size_id; ?>" name="sizess"><?php echo $sizes?></option>

									<?php
								}
							}
						}
						?>



					</select>
					<h3>quantity</h3>
					<input type="number" name="quan" value="1" min="1"  />
					<input type="hidden" name="hide" value="<?php echo $getid ?>" />
					
					<br><br><br>

					<input type="submit" value="Add to Cart" name="add" class="btn btn-success"/>
				</form>
			</div>
		</div>
	</div>

		<div class="col-md-9">
			<?php

			$querry = mysql_query("SELECT * FROM products where id=$getid");
			while($rows = mysql_fetch_assoc($querry))
			{
				$id = $rows['id'];
				$name = $rows['name'];
				$price = $rows['price'];
				$_SESSION["price"] = $rows['price'];
				$image = $rows['image'];
				$desc = $rows['description'];
			}
			?>
			<div class="thumbnail">
				<div>
					<!-- <img class="img-responsive" src="image/products/<?php //echo $image ?>" alt=""> -->
					<div id="myCarousel" class="carousel slide">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="2" class="active"></li>

						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<div>
									<center>
										<img class="img-responsive" src="image/products/<?php echo $image ?>" alt="" width="500px" height="500px">
									</center>
								</div>
								<div class="carousel-caption">
								</div>
							</div>

							<?php
							$querry = mysql_query("SELECT * FROM other_sides where prod_id=$getid");
							while($rows = mysql_fetch_assoc($querry))
							{
								$image2 = $rows['image'];

								?>
								
								<div class="item">
									<div>
										<center>
											<img class="img-responsive" src="image/products/<?php echo $image2 ?>" alt="" width="500px" height="500px">
										</center>
									</div>

									<div class="carousel-caption">

									</div>
								</div>

								<?php } ?>


								<!-- Controls -->
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<span class="icon-prev"></span>
							</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
								<span class="icon-next"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="caption-full">

					<h4 class="pull-right">Php <?php echo $price ?></h4>
					<h4><a href="#"><?php echo $name ?></a>
					</h4>
					<?php 
					echo $desc 



					?>
				</div>

			</div>



		</div>

	</div>
</div>

</div>


<!-- /.section -->

<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/modern-business.js"></script>

</body>

</html>
