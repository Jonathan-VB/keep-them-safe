<?php
	if (isset($_SESSION['email'])) {
		echo "<div id='loggedin' class='navbar-form navbar-right'>Welcome <a href='myaccount.php'>".$_SESSION['fname']." ".$_SESSION['lname']."</a>&nbsp;&nbsp;<a href='php/logoutaction.php'>Logout</a>&nbsp&nbsp&nbsp&nbsp</div>";
	}
	else{
		require "loginform.php";
	}
?>
