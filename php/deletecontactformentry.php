<?php
	session_start();
	require_once 'dbconnect.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		//delete contact form entry
		mysql_query("DELETE FROM `contact` WHERE id=$id");
		header("Location:../admincontactussubmissions.php");
	}
	else{
		echo "ID not passed";
	}
?>