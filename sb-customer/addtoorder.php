<?
$id = $_SESSION['userid'];
	$querry = mysql_query("SELECT * FROM accounts where user_id = $id");
	while($rows = mysql_fetch_assoc($querry))
	{
			$_SESSION['fname'] = $rows['fname'];
	}
	
	if(isset($_POST['submit']))
	{
		$id = $_SESSION['userid'];
		$tprice = 0;
		$receipt = "";
		$querry = mysql_query("SELECT * FROM cart JOIN products ON cart.product = products.id where customer_num = $id");
		while($rows = mysql_fetch_assoc($querry))
		{
				$prod = $rows['name'];
				$pid = $rows['cid'];
				$quantity = $rows['quantity'];
				$price = $rows['tprice'];
				$size = $rows['size'];
				$thru = $rows['thru'];

				$querrry = mysql_query("SELECT * FROM sizes where size_id = $size");
				while($rowws = mysql_fetch_assoc($querrry))
				{
					$size_n = $rowws['size'];
				}
				
				$tprice=($tprice+$price);
				$receipt = $receipt . "Product Name: ". $prod." <br> Size: ".$size_n." <br> Quantity: ".$quantity." <br>Price: ".$price."<br>Price: ".$thru."<br>"; 
		}
		 
		  mysql_query("INSERT INTO product_orders set customer_num='$id', product='$receipt', tprice='$tprice', date='NOW()'");

		  mysql_query("DELETE FROM cart WHERE customer_num = $id");
		  echo "<script>confirm('are you sure to submit your order?');</script>";
   		  echo "<script>window.location = 'email.php';</script>";
	}
	?>