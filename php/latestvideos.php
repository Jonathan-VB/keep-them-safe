<?php
	require_once 'dbconnect.php';
	//Get latst two videos 
	$query = mysql_query("SELECT * FROM `approvedvideos` ORDER BY `videoId` DESC LIMIT 2");

	while ($row = mysql_fetch_assoc($query)) {
		$videoId = $row['videoId'];
		$videoTitle = $row['videoTitle'];
		$videoText = $row['videoText'];
		echo "<a href='watchvideo.php?videoId=$videoId'><img src='include/images/thumbnail.png' width='274'></a>";
		echo "<div class='caption'><h4>"."<a href='watchvideo.php?videoId=$videoId'>".$videoTitle."</a>"."</h4></div>";
		echo substr($videoText, 0,100)."....."."</br></br></br>";
	}
?>