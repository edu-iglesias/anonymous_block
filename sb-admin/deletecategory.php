<?php 
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted'])){
		header("location:../login.php");
	}
	$id = $_GET['id'];
	mysql_query("DELETE from category where category_id = $id");
	header("location:products-cms.php");
?>