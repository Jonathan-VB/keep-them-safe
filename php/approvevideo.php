<?php
require_once 'dbconnect.php';
if (isset($_POST["videoId"])) {
	$videoId = $_POST["videoId"];
	$getVideoDetails = "SELECT * FROM pendingvideos WHERE videoId = $videoId";
	$retrievevideo = mysql_query($getVideoDetails);

	//If returns a video, move it to new table and delete from old one
	if ($retrievevideo != 0) {
		mysql_query("INSERT INTO approvedvideos (videoTitle, videoText, videoTags, videoGroup, videoName, videoUrl) SELECT videoTitle, videoText, videoTags, videoGroup, videoName, videoUrl FROM pendingvideos WHERE videoId = $videoId");
		mysql_query("DELETE FROM `pendingvideos` WHERE videoId = $videoId");
		header("Location:../adminvideolist.php");
	}
	else{
		echo "no video found";
	}
}
else{
	echo "no video id passed in";
}
?>