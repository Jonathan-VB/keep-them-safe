<?php
require_once 'dbconnect.php';
if (isset($_POST['forumsearchbox'])) {
	//store the data for searching
	$searchtopics = mysql_real_escape_string(htmlentities(trim($_POST['forumsearchbox'])));
	//quey for search
	$query = mysql_query("SELECT * FROM `topics` WHERE `topicTitle` LIKE '%$searchtopics%'");

	//return any rows of data
	while ($row = mysql_fetch_assoc($query)) {
		if ($row != 0) {
			$topicId = $row['topicId'];
			$topicTitle = $row['topicTitle'];
			echo "<a href='forumtopic.php?id=$topicId'>$topicTitle</a></br>";
		}
		elseif ($row == 0) {
			echo "Nothing matched your search :(";
		}
	}
}

else{
	echo "No search data recieved to searchforum.php";
}   
?>
