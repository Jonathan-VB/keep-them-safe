<?php
session_start();
if ($_SESSION['role'] != "Admin") {
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
  <title>Admin - View Video</title>
</head>
<body>
 <?php
 include 'navbar.php'
 ?>
 <div class="container">
  <div id="adminviewvideomain" class="col-md-offset-2 col-md-8 spacer">
    <?php
    if (isset($_GET['videoId'])) {
      $videoId = $_GET['videoId'];
      $query = mysql_query("SELECT * FROM `pendingvideos` WHERE videoId = '$videoId'");
      while ($row = mysql_fetch_assoc($query)) {
       $videoTitle = $row['videoTitle'];
       $videoText = $row['videoText'];
       $videoName = $row['videoName'];
       $videoUrl = $row['videoUrl'];
       $videoTags = $row['videoTags'];
     }
   }
   else{
    echo "Uhoh - Something went wrong!";
  }
  ?>
  <label>Video Title</label></br>
  <?php echo $videoTitle; ?></br></br>

  <label>Video Support Text</label></br>
  <?php echo $videoText; ?></br></br>

  <label>Video</label></br>
  <video controls class="videoplayer" src=<?php echo $videoUrl; ?> width='800'></video></br></br>

  <label>Video Tags</label></br>
  <?php echo $videoTags; ?></br></br>

  <form action="php/approvevideo.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="videoId" value="<?php echo $videoId; ?>"/>
    <input type="submit" name="submit" class="btn btn-success" value="Accept Video"/>
  </form></br>
  <form action="php/rejectvideo.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="videoId" value="<?php echo $videoId; ?>"/>
    <input type="submit" name="submit" class="btn btn-danger" value="Reject Video"/>
  </form>
</div>
</div>
</body>
</html>