<?php 
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted'])){
		header("location:../login.php");
	}
	$id = $_GET['id'];
	mysql_query("UPDATE accounts set status='0'where user_id = $id");
	header("location:accounts.php");
?>