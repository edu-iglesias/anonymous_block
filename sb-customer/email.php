<?php 
	
	/* subject and email variable */
	
	$emailSubject = 'Crazy PHP Scripting!';
	$webMaster = 'renanplacido@yahoo.com';
	
	
	
	
	/* Gathering data Variables */
	$id = $_SESSION['oid'];
	$querry = mysql_query("SELECT * FROM product_order where oid = $id");
		while($rows = mysql_fetch_assoc($querry))
		{
				$prod = $rows['product'];
				$price = $rows['tprice'];
				$size = $rows['size'];
				$num = $rows['customer_num'];

				$querrry = mysql_query("SELECT * FROM sizes where size_id = $size");
				while($rowws = mysql_fetch_assoc($querrry))
				{
					$size_n = $rowws['size'];
				}
				$querrrry = mysql_query("SELECT * accounts where user_id = $num");
				while($rowwws = mysql_fetch_assoc($querrrry))
				{
					$email = $rowwws['email'];
				}
				
				$tprice=($tprice+$price);
				$receipt = $receipt . "Product Name: ". $prod." <br> Size: ".$size_n." <br> Quantity: ".$quantity." <br>Price: ".$price."<br>"; 
		}
		 
	
	$body = <<<EOD
<br><hr><br>
Thankou for ordering.
You order <br>
$prod <br>
Price :$price <br>
Size: $size <br>
EOD;

	$headers = "From: renanplacio@yahoo.com\r\n";
	$headers .="Content-type: text/html\r\n";
	$success = mail($webMaster, $emailSubject, $body, $headers);
	header("location:orders.php");

?>