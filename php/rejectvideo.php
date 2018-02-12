<?php
	require_once 'dbconnect.php';

	$videoId = $_POST["videoId"];
	//delete row from db
	if (isset($videoId)) {
		mysql_query("DELETE FROM `pendingvideos` WHERE videoId = $videoId");
		header("Location:../adminvideolist.php");
	}

	else{
		echo "error";
	}
?>