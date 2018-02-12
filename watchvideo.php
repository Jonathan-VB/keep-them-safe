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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Watch Video</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div class="spacer col-md-offset-2 col-md-8">
      <?php
      if (isset($_GET['videoId'])) {
        $videoId = $_GET['videoId'];
        $query = mysql_query("SELECT * FROM `approvedvideos` WHERE videoId='$videoId'");
        while ($row = mysql_fetch_assoc($query)) {
         $videoTitle = $row['videoTitle'];
         $videoText = $row['videoText'];
         $videoName = $row['videoName'];
         $videoUrl = $row['videoUrl'];
       }
       echo "<h2>".$videoTitle."</h2></br>";
       echo $videoText."</br></br></br>";
       echo "<video controls class='videoplayer' src='$videoUrl'></video>";
     }
     else{
      echo "Uhoh something went wrong! :(";
    }
    ?>
  </div>
</div>
</body>
</html>