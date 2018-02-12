<?php
	require_once 'dbconnect.php';
	$userid = $_GET['id'];
	//changes user to default user
	if (isset($userid)) {
		mysql_query("UPDATE `users` SET `role` = 'User' WHERE id = $userid");
		header("Location:../viewusers.php");
	}
	else{
		echo "user id not got";
	}
?>