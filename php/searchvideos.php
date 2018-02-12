<?php
require_once 'dbconnect.php';
if (isset($_POST['videosearchdata'])) {
 $searchvideos = mysql_real_escape_string(htmlentities(trim($_POST['videosearchdata'])));
 $query = mysql_query("SELECT * FROM `approvedvideos` WHERE `videoTags` LIKE '%$searchvideos%' OR `videoTitle` LIKE '%$searchvideos%'");
 $query2 = mysql_query("SELECT * FROM `approvedvideos` ");

 while($row = mysql_fetch_assoc($query)){
  if ($row != 0) {
   $videoId = $row['videoId'];
   $videoTitle = $row['videoTitle'];
   $videoText = $row['videoText'];
   echo "<div id='videolist' class='col-md-12'>";
   echo "<div id='videoicon' class='col-md-4'>";
   echo "<a href='watchvideo.php?videoId=$videoId'><img src='include/images/thumbnail.png' width='100%'></a>";
   echo "</div>";
   echo "<div id='videotext' class='col-md-offset-1 col-md-7'>";
   echo "<div class='col-md-8><div class='caption'><h4><a href='watchvideo.php?videoId=$videoId'>".$videoTitle."</a></h4>";
   echo substr($videoText, 0,200)."....."."</div></br></br></br>";
   echo "</div>";
   echo "</div>";
 }	
 else{
   echo "Nothing matched your search :(";
 }
}
}
else{
 echo "No search data recieved to searchvideos.php";
}   
?>
