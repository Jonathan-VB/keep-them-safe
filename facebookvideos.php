<?php
session_start();
if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
  if ($role !== "Admin" &&  $role !== "Content" && $role !== "User") {
   header("Location: noaccess.php");
 }
}
elseif (!isset($role)) {
  header("Location: noaccess.php");
}
require_once 'php/dbconnect.php';
$query = mysql_query("SELECT * FROM approvedvideos WHERE videoGroup = 'facebookVideo' ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Facebook Videos</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="videosmain" class="spacer col-md-offset-1 col-md-10">
      <div><h3>Facebook Video Tutorials</h3></div>
      <?php
      while ($row = mysql_fetch_assoc($query)) {
        if ($row != "") {
          $videoId = $row['videoId'];
          $videoTitle = $row['videoTitle'];
          $videoText = $row['videoText'];
          echo "<div id='videolist' class='col-md-12'>";
          echo "<div id='videoicon' class='col-md-3'>";
          echo "<a href='watchvideo.php?videoId=$videoId'><img src='include/images/thumbnail.png' width='100%'></a>";
          echo "</div>";
          echo "<div id='videotext' class='col-md-offset-1 col-md-7'>";
          echo "<div class='col-md-8><div class='caption'><h4><a href='watchvideo.php?videoId=$videoId'>".$videoTitle."</a></h4>";
          echo substr($videoText, 0,200)."....."."</div></br></br></br>";
          echo "</div>";
          echo "</div>";
        }
        else{
          echo "<div class='videospacer'>";
          echo "<h4>No videos to watch</h4>";
          echo "</div>";
        }
      }
      ?>
    </div>
  </div>
</body>
</html>


