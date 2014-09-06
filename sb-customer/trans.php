<?php
include('../dbconnect.php');
	session_start();
	$id =$_REQUEST['id'];
	 $trans = $_POST['trans'];	
 if(isset($_POST['submit'])){ 
			 mysql_query("UPDATE product_orders set status='1',trans_num='$trans' WHERE oid = $id");
			  header("location:orders.php");
								}
								
if(isset($_POST['edit'])){ 
			   mysql_query("UPDATE product_orders set ,trans_num='$trans' WHERE oid = $id");
			  header("location:orders.php");
								}
								?>