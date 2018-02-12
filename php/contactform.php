<?php
session_start();

require_once 'dbconnect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if($name != ""){
	if ($email != "") {
		//check format of email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location:../contact.php?bademail=That is not valid email");
		}
		else {
			//if all fields are not empty, insert the row into the db
			if ($message != "") {
				mysql_query("INSERT INTO `contact` VALUES ('','$name','$email','$message')");
				header("Location:../contact.php?success=Message Sent!");
			}
			else{
				header("Location:../contact.php?message=Message is empty");
			}
		}	
	}
	else{
		header("Location:../contact.php?email=Email is empty");
	}
}
else{
	header("Location:../contact.php?name=Name is empty");
}

?>