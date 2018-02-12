<?php
	if (!isset($_SESSION['role'])){
		require 'navbaruser.php';
	}
	else{
		if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['role'] == "Admin") {
			require 'navbaradmin.php';
		}
		if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['role'] == "Content") {
			require 'navbarcontent.php';
		}
		if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['role'] == "User") {
			require 'navbaruser.php';
		}
	}
?>

