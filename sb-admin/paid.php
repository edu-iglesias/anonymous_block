<?php
include('../dbconnect.php');
	session_start();
	$id =$_REQUEST['id'];	
 if(isset($_POST['submit'])){ 
 
			 mysql_query("UPDATE product_orders set status='2' ,date=NOW() WHERE oid = $id");
	 header("location:order.php");
	 
								}

								?>