
<?php
include('../dbconnect.php');
	session_start();


					$id=$_SESSION['id'];
                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
					$password = $_POST['pass'];
                    $address = $_POST['address'];  
                    $contactno = $_POST['contactno'];
					$query = "UPDATE accounts set lname='$lastname',fname='$firstname',email='$email',password='$password',address='$address',contact_no='$contactno' WHERE user_id = $id";
                    mysql_query($query) or die(mysql_error());
					mysql_close($dbcon);
?>