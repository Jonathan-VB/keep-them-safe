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
    <title>Admin Video List</title>
  </head>
  <body>
    <?php
  include 'navbar.php'
  ?>
  <div class="container">
      <div id="adminvideolist" class="col-md-offset-1 col-md-10">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Video ID</th>
              <th>Video Title</th>
              <th>Video Group</th>
            </tr>
          </thead>
          <tbody>  
            <?php
              $query = mysql_query("SELECT * FROM `pendingvideos`");
              while ($row = mysql_fetch_assoc($query)) {
                $videoId = $row['videoId'];
                $videoTitle = $row['videoTitle'];
                $videoGroup = $row['videoGroup'];
                if ($row == null) {
                  echo "There are no videos to watch at this time :(";
                }
                else{
                  echo "<tr>"."<td>".$videoId."</td>"."<td><a href='adminviewvideo.php?videoId=".$videoId."'>".$videoTitle."</a></td>"."<td>".$videoGroup."</td>"."</tr>";
                }
              }
            ?>
          </tbody> 
        </table>
      </div>
    </div>
  </body>
</html>


