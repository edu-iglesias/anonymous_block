<?php
include('../dbconnect.php');
	session_start();
	$id =$_REQUEST['id'];	
 if(isset($_POST['finish'])){ 
				
			
			
			
			
			 mysql_query("UPDATE product_orders set status='4' ,date=NOW() WHERE oid = $id");
			 mysql_query("INSERT INTO order_history set customer_num='$custnum',product='$product',date_ordered='$date',date_finished='NOW()',price='$tprice'");
	 header("location:order.php");
								}

								?>