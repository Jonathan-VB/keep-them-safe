<?php
	require_once 'dbconnect.php';
	$userid = $_GET['id'];

	if (isset($userid)) {
		mysql_query("DELETE FROM `users` WHERE id= $userid");
		header("Location:../viewusers.php");
	}
	else{
		echo "user id not got";
	}
?>