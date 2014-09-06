<?php
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted']))
	{
		header("location:../login.php");
	}
	$id = $_SESSION['userid'];
	$productlist = $_SESSION['prodlist'];
	$tprice = $_SESSION['tprice'];
	
	$query = "INSERT INTO order set customer = $id, tprice = $tprice";
	  mysql_query($query) or die(mysql_error());
	  	$sql = "DELETE * FROM cart WHERE cid= $id";
	  mysql_query($sql) or die(mysql_error());
?>