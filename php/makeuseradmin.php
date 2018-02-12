<?php
	require_once 'dbconnect.php';
	$userid = $_GET['id'];
	//changes the users priveleges to admin
	if (isset($userid)) {
		mysql_query("UPDATE `users` SET `role` = 'Admin' WHERE id = $userid");
		header("Location:../viewusers.php");
	}
	else{
		echo "user id not got";
	}
?>