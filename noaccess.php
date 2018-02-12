<?php
session_start();
require_once 'php/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>No Access!</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="noaccessmain" class="spacer col-md-offset-4 col-md-4">
      <h3 class="error">Uhoh! - No access</h3></br>
      This section of the site is only accessible to registered users. Please register
      <a href="register.php">here</a> to access these areas!
    </div>
  </div>
</body>
</html>