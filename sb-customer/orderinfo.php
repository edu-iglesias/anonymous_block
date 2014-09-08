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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <div class="row">
 <center>
          
            <h2>CART</h2>
			
			
				<table class="table table-striped table-hover" align="center" class="table" width="80%">
                  <tr class="success">
                    <th>&nbsp&nbsp&nbspImages <i class="fa fa-sort"></i></th>
                    <th>Product Name <i class="fa fa-sort"></i></th>

					<th>Size <i class="fa fa-sort"></i></th>
					<th>Quantity<i class="fa fa-sort"></i></th>
                    <th>Price<i class="fa fa-sort"></i></th>
					


                   
                  </tr>
                </thead>
                <tbody>
				
					<?php
						$querry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where customer_num='$id'");
						while($rows = mysql_fetch_assoc($querry))
						{
								$prod = $rows['product'];
								$pid = $rows['cid'];
								$quantity = $rows['quantity'];
								$price = $rows['tprice'];
								$image = $rows['image'];
								$name = $rows['name'];
								$sizes = $rows['size'];
								
						$queerry = mysql_query("SELECT * FROM sizes where size_id='$sizes'");
						while($rows = mysql_fetch_assoc($queerry))
						{
							$sizess = $rows['size'];
						}						
						
					?>
				<form action="editquan.php?id=<?php echo $pid;?>"method="POST">
                  <tr>
                    <td ><img src="image/products/<?php echo $image ?>" width="70px" height="100px"></td>
                    <td ><?php echo $name ?></td>
					
                    <td ><input type="number" name="quant" min="1" value="<?php echo $quantity;?>" placeholder="Enter the quantity here" /><br><br>
					<input type="submit" name="edit" value="Edit" class="btn btn-primary"></td>
					<td ><?php echo $sizess ?></td>
                    <td><?php echo "Php " . $price ?><br><br>
					</td>
					 </form>
					<form action=""method="POST">
                    <td ><input type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
					</form>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
			  <div class="form-group">
			   <div class="container">

      <hr>

      <footer>
	  <?php
	  $result = mysql_query("SELECT * FROM cart");
				if(mysql_num_rows($result) > 0){?>
				<div class="row">
          <div class="col-lg-12">
		   <div class="col-sm-offset-1 col-sm-10"> 
						<form action=" " method="POST">
           <button type="submit" name="submit" class="btn btn-success">ORDER</button>
          </div>
        </div>
		<?php }	else { ?>
					<div class="alert alert-dismissable alert-warning">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<h4><p>Your cart is empty, Order first on the product gallery.</p></h4>
					
					</div>
				
				<?php } ?>
      </footer>
    </div>
					
						
						</form>
                    </div> 
                </div>
           
		  </body>
	    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>