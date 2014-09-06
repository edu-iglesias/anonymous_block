<?php
	include('../dbconnect.php');
	session_start();
	$prod_id = $_REQUEST["id"];
echo "<script>confirm('are you sure to cancel your order?');</script>";
	
	$queryy = "DELETE FROM product_orders WHERE oid = $prod_id";
                    mysql_query($queryy) or die(mysql_error());

echo "<script>window.location = 'orders.php';</script>";



?>