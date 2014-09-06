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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['fname'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
               
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
           <li><a href="admin-settings.php"><i class="fa fa-user"></i>Edit Profile</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
      
        </div><!-- /.row -->

		<div class="panel panel-default"> 
                <div class="panel-heading">ACCEPTED ORDERS</div> 
			<br>
			<table class="table table-hover" align="right" width="100%" >

			
					<th>ID </th> 
                    <th>FIRST NAME </th>  
					 <th>LAST NAME </th>  
					<th>DETAILS </th>   
                    <th>QUANTITY</th> 
                    <th>IMAGE</th> 
					
                    <center> <th >TRANSACTION NUMBER </th> </center>
					<th>ACTION</th> 
                    <?php
				
				$querrry = mysql_query("SELECT * FROM product_orders where status = 1");
				$num_rows = mysql_num_rows($querrry);
				while($rows = mysql_fetch_assoc($querrry))
				{
						
						$id = $rows['oid'];
						$price = $rows['tprice'];
						$product = $rows['product'];
						$quantity = $rows['quantity'];
						$trans = $rows['trans_num'];
						$status = $rows['status'];
						$custnum = $rows['customer_num'];
						$date = $rows['date'];
						
							$querry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                       while($rowss = mysql_fetch_assoc($querry))
				{ 
						$fname = $rowss['fname'];
						$lname = $rowss['lname'];
						}
				 $query = mysql_query("SELECT * FROM products where id = $product");
				while($rowsss = mysql_fetch_assoc($query))
				{
						$name = $rowsss['name'];
						$image = $rowsss['image'];
						}
				$queery = mysql_query("SELECT * FROM sizes");
				while($rowssss = mysql_fetch_assoc($queery))
				{
						$size = $rowssss['size'];
						
						}
					echo '<tr>';
					
                            echo '<td>'.$id.'</td>';
                            echo '<td>'.$lname.'</td>';
                            echo '<td>'.$fname.'</td>';
                             echo '<td>Price: '.$price.'<br>Product Name:  '.$name.'<br>Size: '.$size.'<br>'.'Date Accepted: '.$date.'</td>';
							
                            echo '<td>'.$quantity.'</td>';
							 ?>
                             <td ><img src="image/products/<?php echo $image ?>" width="80px" height="100px"></td>
							<?php
							
								echo '<td>'.$trans.'</td>';
							
							?>
							<td>
						<form action="paid.php?id=<?php echo $id?>" method="POST">
						
                 <input type="submit" value="PAID" name="submit" class="btn btn-success"/>
				 
				  </form>
						</td>
								<?php
                            echo '</tr>';
						
}
                     ?>
					 
				
</table>
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