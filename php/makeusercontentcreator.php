<?php
	require_once 'dbconnect.php';
	$userid = $_GET['id'];
	//changes user to content creator
	if (isset($userid)) {
		mysql_query("UPDATE `users` SET `role` = 'Content' WHERE id = $userid");
		header("Location:../viewusers.php");
	}
	else{
		echo "user id not got";
	}
?>