<?php 
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted'])){
		header("location:../login.php");
	}
	$id = $_GET['id'];
	mysql_query("UPDATE product_orders set status='1',date=NOW() where oid = $id");
	header("location:order.php");
?>