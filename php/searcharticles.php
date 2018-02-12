<?php
    require_once 'dbconnect.php';
    if (isset($_POST['articlesearchdata'])) {
    	$searcharticles = mysql_real_escape_string(htmlentities(trim($_POST['articlesearchdata'])));
	    $query = mysql_query("SELECT * FROM `approvedarticles` WHERE `articleTags` LIKE '%$searcharticles%' OR `articleTitle` LIKE '%$searcharticles%'");
	    
	    if($row = mysql_fetch_assoc($query)) {
	    	if ($row != 0) {
	    		$articleId = $row['articleId'];
	        	$articleTitle = $row['articleTitle'];
	        	$articleContent = $row['articleContent'];
	            echo '<div class="caption"><h4>'.'<a href = "viewarticle.php?id='.$articleId.'">'.$articleTitle.'</a></h4></div>';
	            echo substr($articleContent, 0,400).'.....'.'</br></br></br>';
	    	}  
	    }
	    else{
	    	echo "Nothing matched your search :(";
	    }
    }
    else{
    	echo "No search data recieved to searcharticles.php";
    }   
?>