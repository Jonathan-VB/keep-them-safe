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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Search Videos</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="searcharticlemain" class="spacer col-md-offset-2 col-md-8">
      <div id="videosearch" class="panel-info">
        <div class="panel-heading"><b>Search Video Tutorials</b></div>
        <div class="panel-body">
          <div id="articlesearchform">
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/searchvideos.js"></script>
            <b>Search Videos&nbsp;&nbsp;</b><input id="videosearchdata" name="videosearch" type="text"/>&nbsp;
            <input type="submit" name="submit"  value="Search Videos" onclick="SearchVideos(videosearchdata.value)"/>
          </div>
          <div id="articlesearchresults">
            <div id="articlesearchresultstitle">
            </br></br><h3>Search Results</h3>
            </div></br>
            <div id="searchresultdata">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

