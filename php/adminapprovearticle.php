<?php
require_once 'dbconnect.php';
//if article id is set to something enter statment
if (isset($_POST["articleId"])) {
	$articleId = $_POST["articleId"];
	//check that the row exists
	$getArticleDetails = "SELECT * FROM pendingarticles WHERE articleId = $articleId";
	$retrievearticle = mysql_query($getArticleDetails);

	//if row exists move from pendingarticles to approvedarticles
	if ($retrievearticle != 0) {
		mysql_query("INSERT INTO `approvedarticles` (articleTitle, articleContent, articleDateCreated, articleTags) SELECT articleTitle, articleContent, articleDateCreated, articleTags FROM pendingarticles WHERE articleId = $articleId");
		//delete form the pendinglist
		mysql_query("DELETE FROM `pendingarticles` WHERE articleId = $articleId");
		header("Location:../adminviewpendingarticles.php");
	}
	else{
		echo "Article was not found";
	}
}

else{
	echo "no article id passed in";
}
?>