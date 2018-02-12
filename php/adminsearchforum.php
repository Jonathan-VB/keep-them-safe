<?php
require_once 'dbconnect.php';
if (isset($_POST['forumsearchbox'])) {
	//read in the text from searchbox/ store as variable
	$searchtopics = mysql_real_escape_string(htmlentities(trim($_POST['forumsearchbox'])));
	$query = mysql_query("SELECT * FROM `topics` WHERE `topicTitle` LIKE '%$searchtopics%'");

	//if a row is equal to the search, get the data and create a clickable link
	if ($row = mysql_fetch_assoc($query)) {
		if ($row != 0) {
			$topicId = $row['topicId'];
			$topicTitle = $row['topicTitle'];
			echo "<a href='adminforumtopic.php?id=$topicId'>$topicTitle</a></br>";
		}
	}

	else{
		echo "Nothing matched your search :(";
	}
}

else{
	echo "No search data recieved to searchforum.php";
}   
?>
