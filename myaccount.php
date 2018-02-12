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
  <title>Your Account</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="myaccountmain">
      <div class="col-md-offset-3 col-md-6" id="myaccountmenu">
        <h4>Welcome <?php echo $_SESSION['fname']."&nbsp".$_SESSION['lname']; ?></h4></br></br>
        <label>Account Options</label></br>
        <a href="changepasswordform.php">Change my password</a></br>
      </div>
    </div>
  </div>
</body>
</html>