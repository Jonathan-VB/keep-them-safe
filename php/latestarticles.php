<?php
	require_once 'dbconnect.php';
	//query = get all the articles from approved articles and sort by highest id and only return first 2 rows
	$query = mysql_query("SELECT * FROM `approvedarticles` ORDER BY `articleId` DESC LIMIT 2");

	while ($row = mysql_fetch_assoc($query)) {
		$articleId = $row['articleId'];
		$articleTitle = $row['articleTitle'];
		$articleContent = $row['articleContent'];
		echo "<div class='thumbnail>";
		echo "<div class='caption'><h4>"."<a href='viewarticle.php?id=$articleId'>".$articleTitle."</a>"."</h4></div>";
		echo substr($articleContent, 0,400)."....."."</br></br></br>";
		echo "</div>";
	}
?>