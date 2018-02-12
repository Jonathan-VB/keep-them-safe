<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Keep Them Safe - Home</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="indexmain">
      <div class="jumbotron" id="jumbotron">
        <h1 >Internet Safety Starts Here</h1>
        <p>A site dedicated to help you and your children be safer on the web</p></br></br></br></br></br></br>
        <a href="registerform.php"><button id="starthere">Register Here</button></a>
      </div>
      <div id="smtags" class="col-md-offset-5 col-md-2">
        <a id="facebookfooter" class="social-slide" href="http://www.facebook.com"></a>
        <a id="twitterfooter" class="social-roll" href="http://www.twitter.com"></a>
      </div>
      <div class="col-md-offset-1 col-md-10" id="latest">
        <div id="latestvideos"class="col-md-5">
          <div class="page-header">
            <h3>Newest Videos</h3>
          </div>
          <div>
            <?php require 'php/latestvideos.php' ?>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div id="latestarticles" class="col-md-5">
          <div class="page-header">
            <h3>Newest Articles</h3>
          </div>
          <div>
            <?php require 'php/latestarticles.php' ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
