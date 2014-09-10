<?php
	include('../dbconnect.php');
	session_start();
	$id =$_REQUEST['id'];	
	$date = $_POST['end'];
	$releaseDate = date('Y-m-d', strtotime(str_replace('-', '/', $date)));

 	if(isset($_POST['submit']))
 	{ 
		mysql_query("UPDATE product_orders set status='2' , date=NOW(), release_date = '$releaseDate' WHERE oid = $id");
	 	header("location:order.php");
	}
?>