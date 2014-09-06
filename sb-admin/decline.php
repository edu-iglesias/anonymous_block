<?php 
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted'])){
		header("location:../login.php");
	}
	$id = $_GET['id'];
	mysql_query("DELETE from product_orders where oid = $id");
	header("location:order.php");
?>