<?php
session_start();
if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
  if ($role !== "Admin" &&  $role !== "Content") {
   header("Location: noaccess.php");
 }
}
elseif (!isset($role)) {
  header("Location:noaccess.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Add New Video</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="contentsubmit">
      <div class="spacer col-md-offset-3 col-md-6">
        <h3>Upload New Video</h3></br></br>
        <form action="php/submitvideo.php" method="POST" enctype="multipart/form-data">
         <label>Video Title</label></br>
         <input type="text" class="form-control" name="videoTitle"/></br></br>
         
         <label>Video Description</label></br>
         <textarea type="text"  class="form-control" rows="4" name="videoText"/></textarea></br></br>
         
         <label>Select File</label></br>
         <input type="file" class="form-control" name="file"/>
         <span class="error"><?php if (isset($_GET['badvideofile'])) {echo $_GET['badvideofile'];} ?></span>
         <span class="error"><?php if (isset($_GET['fileexists'])) {echo $_GET['fileexists'];} ?></span></br></br>
         
         <label>Select Group Tag</label></br>
         <select class="form-control" name="videoGroup">
          <option value="generalvideo">General Video</option>
          <option value="twittervideo">Twitter Video</option>
          <option value="facebookvideo">Facebook Video</option>
          <option value="youtubevideo">Youtube Video</option>
        </select></br></br>
        
        <label>Video Tags</label></br>
        <textarea class="form-control" type="text" name="videoTags"/ placeholder="Use spaces to seperate tags"></textarea></br></br>
        
        <input type="submit" class="btn btn-success" name="submit" value="Upload Video"/>&nbsp;<span class="success"><?php if (isset($_GET['success'])) {echo $_GET['success'];} ?></span>
      </form>
    </div>
  </div>
</div>
</body>
</html>
