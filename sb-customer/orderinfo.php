<?php 
	include('../dbconnect.php');
	session_start();

	if(!isset($_SESSION['accessgranted']))
	{
		header("location:../login.php");
	}

	$id = $_SESSION['userid'];
	$querry = mysql_query("SELECT * FROM accounts where user_id = $id");
	while($rows = mysql_fetch_assoc($querry))
	{
		$_SESSION['fname'] = $rows['fname'];
	}

	date_default_timezone_set('Asia/Manila');
	$dates = date('m/d/Y');
	if(isset($_POST['submit']))
	{	

		$id = $_SESSION['userid'];
		$tprice = 0;
		$receipt = "";

		$querry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where customer_num = $id");
		while($rows = mysql_fetch_assoc($querry))
		{
			$prod = $rows['name'];
			$pid = $rows['cid'];
			$quantity = $rows['quantity'];
			$price = $rows['tprice'];
			$size = $rows['size'];
			$thru = $rows['thru'];
			$querrry = mysql_query("SELECT * FROM sizes where size_id = $size");
			while($rowws = mysql_fetch_assoc($querrry))
			{
				$size_n = $rowws['size'];
			}

			$tprice=($tprice+$price);
			$receipt = $receipt . "Product Name: ". $prod." <br> Size: ".$size_n." <br> Quantity: ".$quantity." <br>Price: ".$price."<br>Thru: ".$thru."<br>"; 
		}

		mysql_query("INSERT INTO product_orders set customer_num='$id', product='$receipt', tprice='$tprice', date='$dates'");
		mysql_query("DELETE FROM cart WHERE customer_num = $id");
		echo "<script>confirm('are you sure to submit your order?');</script>";
		echo "<script>window.location = 'email.php';</script>";
	}

	if(isset($_POST['delete']))
	{	
		
?>

		<div class="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>One fine body�</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary"><span class="u1w68" id="u1w68_5" style="font-weight: bold; height: 14px;">Save</span> changes</button>
					</div>
				</div>
			</div>
		</div>
	
	
	<?php
		$qurerry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where customer_num = $id");
		while($rowws = mysql_fetch_assoc($qurerry))
		{
			$pid = $rowws['cid'];
		}
		$quereyy = "DELETE FROM cart WHERE cid = $pid";
		mysql_query($quereyy) or die(mysql_error());
		
	}

	$oid = $_REQUEST['id'];

	?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Tables - SB Admin</title>

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
                <a class="navbar-brand" href="index.php">Everlasting sew-n-wearhaus </a>
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
		</div>
	</nav>

	<div class="row" style="padding-left:50px; padding-right:50px;">
		<center>
			<h2>ORDER DETAILS</h2>
		</center>

		<table class="table table-striped table-hover" align="center" class="table" width="100%">
			<thead>
				<tr class="success">
					<th>Images <i class="fa fa-sort"></i></th>
					<th>Product Name <i class="fa fa-sort"></i></th>
					<th>Size <i class="fa fa-sort"></i></th>
					<th>Quantity<i class="fa fa-sort"></i></th>
					<th>Price<i class="fa fa-sort"></i></th>
				</tr>
			</thead>
			<tbody>
				
			<?php
				$querry = mysql_query("SELECT * FROM product_orders where oid ='$oid'");
				while($rows = mysql_fetch_assoc($querry))
				{
					$products = $rows['product'];

				}

				$productsInfo = explode("<br>",$products);
				$rowCount = (count($productsInfo) - 1) / 4;

			?>

			<?php
				$i = 0;
				while($i < $rowCount)
				{
					$addToIndex = 4 * $i;
					$one = 0 + $addToIndex;
					$two = 1 + $addToIndex;
					$three = 2 + $addToIndex;
					$four = 3 + $addToIndex;
			?>

				<tr>
					<td>Carmina is love </td>
					<td><?php echo $productsInfo["$one"]; ?></td>
					<td><?php echo $productsInfo["$two"]; ?></td>
					<td><?php echo $productsInfo["$three"]; ?></td>
					<td><?php echo $productsInfo["$four"]; ?></td>
				</tr>
				

			<?php 
				$i++;
				} 
			?>

			</tbody>
		</table>
	</div>
</body>

<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/modern-business.js"></script>
