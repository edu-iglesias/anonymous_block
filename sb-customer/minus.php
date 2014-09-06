<?php
	include('../dbconnect.php');
	session_start();
	$prod_id = $_REQUEST["id"];

	
	
	$querry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where cid='$prod_id'");
						while($rows = mysql_fetch_assoc($querry))
						{
								$prod = $rows['product'];
								$quantity = $rows['quantity'];
								$tprice = $rows['tprice'];
								$price = $rows['price'];
								$image = $rows['image'];
								$name = $rows['name'];
								
								echo $new_quan = $quantity - 1;
								echo $new_price = $price * $new_quan;
								
	}
	$queryy = "UPDATE cart set tprice='$new_price', quantity='$new_quan' WHERE cid = $prod_id";
                    mysql_query($queryy) or die(mysql_error());


	header("location:cart.php");



?>