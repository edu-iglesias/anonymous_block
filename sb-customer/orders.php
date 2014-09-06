<?php 
	include('../dbconnect.php');
	error_reporting(0);
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
          
            <h2>ORDERS</h2>
			 <center>
	<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         Payment Rules
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
		<p>Wait for your order to be accepted in less than 24 hours.</p> 
        Please pay the exact amount when you deposit the payment.
		<p>Once you have deposited your payment, please confirm details by filling the form so we can immediately process your order.<br />
		<p>Everlasting bank account: XXXXXXXXXXXXXXX<br />
		
	  </div>
    </div>
  </div>
  </div>
  </center>
			<table class="table table-striped table-hover"  class="table" width="100%">
                <thead>
                  <tr class="success">
					
					<th align="center">&nbsp&nbsp&nbspOrder # <i class="fa fa-sort"></i></th>
                    <th align="center">&nbsp&nbsp&nbspDate <i class="fa fa-sort"></i></th>
					<th align="center">&nbsp&nbsp&nbspPrice<i class="fa fa-sort"></i></th>
					<th align="center">&nbsp&nbsp&nbspStatus <i class="fa fa-sort"></i></th>
					<th align="center">&nbsp&nbsp&nbspAction <i class="fa fa-sort"></i></th>
					
					
					
                  </tr>
				  <footer>
	  <?php
	  $result = mysql_query("SELECT * FROM product_orders");
				if(mysql_num_rows($result) > 0){?>
				<div class="row">
          
		<?php }	else { ?>
					<div class="alert alert-dismissable alert-warning">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<h4><p>Order first on the product gallery.</p></h4>
					
					</div>
				
				<?php } ?>
      </footer>
				  
                </thead>
                <tbody>
				
					<?php
						$querry = mysql_query("SELECT * FROM product_orders where customer_num='$id'");
						while($rows = mysql_fetch_assoc($querry))
						{
								$orderid = $rows['oid'];
								$prod = $rows['product'];
								$price = $rows['tprice'];
								$stat = $rows['status'];
								$trans = $rows['trans_num'];
								$id = $rows['oid'];
								$date = $rows['date'];
								
							$query = mysql_query("SELECT * FROM products where id = $prod");
							while($rowss = mysql_fetch_assoc($query))
							{
									$name = $rowss['name'];
									$image = $rowss['image'];
							}
					?>
				
                  <tr>
                    <td  ><?php echo "Order ". $orderid ?></td>
                    <td  ><?php echo  $date ?></td>
                    <td ><?php echo "Php " . $price ?></td>
                    <td >
					<?php
					if($rows['status']==1){
					echo 'PAYMENT';
							}
					else if($rows['status']==0){
								echo 'FOR APPROVAL';

								}
					else if($rows['status']==2){
								echo 'PROCESSING';

								}
					else if($rows['status']==3){
								echo 'COMPLETE';

								}
					else if($rows['status']==4){
								echo 'COMPLETE';

								}?>
								</td>
					
					
					
								<?php
								if($rows['status']==0)
								{
								 ?>  <td ><a href="cancel.php?id=<?php echo $id ?>">CANCEL</a> </td>		
					
								<?php }
								else if($rows['status']==2){
								?>
								
									<td > <br><input type="number" disabled name="trans" min="1" value="<?php echo $trans;?>" placeholder="Enter the trasaction number here" /><br><br>
								<?php
								}
									else if($rows['status']==3){
								?>
								
									<td > <br><br>
								<?php
								}
								else{
							if($rows['trans_num']==0){
								?>
								
								<form action="trans.php?id=<?php echo $id; ?>"method="POST">
									<td > 
									Enter the trasaction number here<br>
									<input type="number" name="trans" min="1" value="<?php echo $trans;?>" placeholder="Enter the trasaction number here" /><br><br>
									 <input type="submit" name="submit" value="Enter" class="btn btn-primary">
									 
									</form> 
									
								<?php 
								}else{
								?>
								<form action="trans.php?id=<?php echo $id; ?>"method="POST">
									<td > 
									Enter the trasaction number here<br>
									
									<input type="number" disabled name="trans" min="1" value="<?php echo $trans;?>" placeholder="Enter the trasaction number here" /><br><br>
									 
									 <input type="submit" name="edit" value="Edit" class="btn btn-primary">
									 
									</form> 
									<?php
								}
								
								
							}?>
			
								<?php
								
				  }
				  ?>
				  
				  
				  
				  
				  
               </tr> </tbody>
              </table>
			  </div>
            <!-- /.row -->

        </div>
		  </body>
	    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>