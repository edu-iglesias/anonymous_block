<?php
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['accessgranted']))
	{
		header("location:../login.php");
	}
	$id = $_SESSION['userid'];
	$querry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where customer_num = $id");
	while($rows = mysql_fetch_assoc($querry))
	{
			$prod = $rows['name'];
			$quan = $rows['quantity'];
			$price = $rows['tprice'];
			$prodlist = $prodlist . "-" . $quan . "-" . $price . "<br>";
			echo "<script>confirm('are you sure to submit your order?');</script>";
			echo "<script>window.location = 'haha.php';</script>";
	}


?>