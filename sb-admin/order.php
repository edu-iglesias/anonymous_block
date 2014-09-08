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
	
	<link rel="stylesheet" type="text/css" href="css/media/css/jquery.dataTables.css">
	
	<script type="text/javascript" language="javascript" src="css/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="css/media/js/jquery.dataTables.js"></script>
	<script>

		$(document).ready(function() {
			$('#examples1').dataTable();
		} );
		$(document).ready(function() {
			$('#examples2').dataTable();
		} );
		$(document).ready(function() {
			$('#examples3').dataTable();
		} );
		$(document).ready(function() {
			$('#examples4').dataTable();
		} );
		
	</script>
	
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
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="accounts.php"><i class="fa fa-user"></i> Accounts</a></li>
            <li class="active"><a href="order.php"><i class="fa fa-table"></i> Orders</a></li>
            <li><a href="products-cms.php"><i class="fa fa-edit"></i> Products</a></li>
            </li>
          </ul>

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
		<div class="row">

            <div class="col-lg-12">
                <h2 class="page-header">Orders</h2>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#service-one" data-toggle="tab">Customer Orders</a>
                    </li>
                    <li><a href="#service-two" data-toggle="tab">Accepted Orders</a>
                    </li>
                    <li><a href="#service-three" data-toggle="tab">Paid Orders</a>
                    </li>
					<li><a href="#service-four" data-toggle="tab">Order history</a>
                    </li>
                    
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">
                       <div class="panel panel-default"> 
                         <div class="panel-heading">CUSTOMER ORDERS</div> 
			<br>
			<table id="examples1" class="table table-hover" class="table" align="right" width="100%" >
			<tr class = "success">
				<thead class="cf">
					<th align="center">Customer Name</th>
                    <th align="center">Product Information</th>
                    <th colspan="2">ACTION </th> 
				</thead>
			</tr>
				     <?php
				
			$q = mysql_query("SELECT * FROM product_orders where status = 0");
				while($rows = mysql_fetch_assoc($q))
				{
						
						$id = $rows['oid'];
						$product = $rows['product'];
						$date = $rows['date'];
						$status = $rows['status'];
						$custnum = $rows['customer_num'];
						$price = $rows['tprice'];
						
							$sequerry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                       while($r = mysql_fetch_assoc($sequerry))
				{ 
						$fnames = $r['fname'];
						$lnames = $r['lname'];
						}
					echo '<tr>';
					
                            echo '<td>'.$lnames.' '.$fnames.'</td>';
                            echo '<td>'.$product.'Total Price:'.$price.'</td>';
							
                           
							if($status == '1'){
								echo '<td>'.'<a href=activated.php?id='.$id.'>VIEW TRANSACTION NUMBER</a>'.'</td>';
							}
							else if($status =='0'){
								echo '<td>'.'<a href=decline.php?id='.$id.'>DECLINE</a>'.'</td>';
								echo '<td>'.'<a href=accept.php?id='.$id.'>ACCEPT</a>'.'</td>';
								
								}
								
                            echo '</tr>';
						}
                     ?>
                   
                
				
</table>
</div>
                    </div>
                    <div class="tab-pane fade" id="service-two">
                        
                        <div class="panel panel-default"> 
                <div class="panel-heading">ACCEPTED ORDERS</div> 
			<br>
			<table id="examples2" class="table table-striped table-hover"  class="table" width="100%">	
                   <thead>
					 <th>Customer Name </th>  
					<th>Order Details </th>   
                    <center> <th >TRANSACTION NUMBER </th> </center>
					<th>ACTION</th> 
					</thead>
                    <?php
				
				$qqquerry = mysql_query("SELECT * FROM product_orders where status='1'");
						while($rows = mysql_fetch_assoc($qqquerry))
						{
								$prod = $rows['product'];
								$price = $rows['tprice'];
								$stat = $rows['status'];
								$trans = $rows['trans_num'];
								$id = $rows['oid'];
								$date = $rows['date'];
								
								$custnum = $rows['customer_num'];
								
						
					   $qqueerry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                       while($rowss = mysql_fetch_assoc($qqueerry))
				{ 
						$fname = $rowss['fname'];
						$lname = $rowss['lname'];
						}
					echo '<tr>';
					
                           
                            echo '<td>'.$fname.' '.$lname.'</td>';
                            echo '<td>'.$prod.'Total Price:'.$price.'</td>';
                        
							
								echo '<td>'.$trans.'</td>';
							
							?>
							
							<td>
						<form action="paid.php?id=<?php echo $id?>" method="POST">
						
                 <input type="submit" value="PAID" name="submit" class="btn btn-success"/>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
				  </form>
						</td>
								<?php
                            echo '</tr>';
						
}
                     ?>
					 
				
</table>
            </div>
						</div>
                    <div class="tab-pane fade" id="service-three">
                        
                        <div class="panel panel-default"> 
                <div class="panel-heading">PAID ORDERS</div> 
			<br>
			<table id="examples3" class="table table-hover" align="right" width="100%" >
                    <thead>
					 <th>Customer Name </th>  
					<th>Order Details </th>   
					<th>Release Date </th>
					<th>ACTION</th> 
					</thead>
                    <?php
				
				$querrry = mysql_query("SELECT * FROM product_orders where status='2'");
						while($rowss = mysql_fetch_assoc($querrry))
						{
								$prod = $rowss['product'];
								$price = $rowss['tprice'];
								$stat = $rowss['status'];
								$trans = $rowss['trans_num'];
								$id = $rowss['oid'];
								$date = $rowss['date'];
								$custnum = $rowss['customer_num'];
								
						
					   $queerrry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                       while($rowsss = mysql_fetch_assoc($queerrry))
				{ 
						$fname = $rowsss['fname'];
						$lname = $rowsss['lname'];
						}
					echo '<tr>';
					
                           
                            echo '<td>'.$fname.' '.$lname.'</td>';
                            echo '<td>'.$prod.'Total Price:'.$price.'</td>';
                            echo '<td> </td>';
							
							?>
                          
							<td>
						<form action=" " method="POST">
						
                 <input type="submit" value="Finish" name="finish" class="btn btn-success"/>
				 
				  </form>
						</td>
								<?php
                            echo '</tr>';
						
						
						if(isset($_POST['finish'])){ 
						mysql_query("UPDATE product_orders set status='3' ,date=NOW() WHERE oid = $id");
						mysql_query("INSERT INTO order_history set customer_num='$custnum',product='$prod',date_ordered='$date',date_finished='NOW()',price='$price'");
						
								}

						
	}					
                     ?>
					 
				
</table>
            </div> </div>
                     <div class="tab-pane fade" id="service-four">
                        
                        <div class="panel panel-default"> 
                <div class="panel-heading">Order history</div> 
			<br>
			<table id="examples4" class="table table-hover" align="right" width="100%" >
				<thead>
                    <th>NAME </th>  
				</thead>
                    <?php
				
				$queerry = mysql_query("SELECT * FROM product_orders where status='3'");
						while($rowwss = mysql_fetch_assoc($queerry))
						{
								$prod = $rowwss['product'];
								$price = $rowwss['tprice'];
								$stat = $rowwss['status'];
								$trans = $rowwss['trans_num'];
								$id = $rowwss['oid'];
								$date = $rowwss['date'];
								$custnum = $rowwss['customer_num'];
								
						
					   $queeerrry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                       while($rowwsss = mysql_fetch_assoc($queeerrry))
				{ 
						$fname = $rowwsss['fname'];
						$lname = $rowwsss['lname'];
						}
					echo '<tr>';
							echo '<td>'.'<a href=orderhistory.php?id='.$id.'>'.$fname.' '.$lname.'</a>'.'</td>';
                          
							 ?>
                           
						
								<?php
                            echo '</tr>';
						
}
                     ?>
					 
				
</table>
            </div> </div>
                   
                </div>
            </div>

        </div>
		
		
               
            </div>
            
             
        

        </div>
    
    <!-- JavaScript -->
   
    <script src="js/bootstrap.js"></script>

  </body>
</html>