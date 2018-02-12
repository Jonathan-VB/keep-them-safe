<?php
	require_once('dbconnect.php');
	//set default role of user
	$role = "User";
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$location = $_POST['location'];
	//if passwords are equal, insert new row
	if ($password == $confirmpassword) {
		mysql_query("INSERT INTO `users` VALUE ('','$role','$fname','$lname','$email','$password','$gender','$dob','$location')");
		header("Location:../confirmregestration.php");
	}

	else{
		echo "Passwords do not match!";
	}

?>