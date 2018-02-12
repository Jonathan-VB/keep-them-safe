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
  <title>Change Password</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="myaccountmain">
      <div class="col-md-offset-3 col-md-6" id="myaccountmenu">
        <h4>Welcome <?php echo $_SESSION['fname']."&nbsp".$_SESSION['lname']; ?></h4></br></br>
        <label>Change Password</label></br></br>
        <form method="POST" action="php/changepassword.php">
          <label>Old Password</label></br>
          <input name="oldpassword" id="loginpassword" type="password" class="form-control" placeholder="Enter Old Password"/>
          <span class="error"><?php if (isset($_GET['error1'])) {echo $_GET['error1'];} ?></span></br></br>

          <label>New Password</label></br>
          <input name="newpassword" id="loginpassword" type="password" class="form-control" placeholder="Enter New Password"/>
          <span class="error"><?php if (isset($_GET['error2'])) {echo $_GET['error2'];} ?></span></br></br>

          <label>Confirm New Password</label></br>
          <input name="confirmnewpassword" id="loginpassword" type="password" class="form-control" placeholder="Confirm New Password"/></br></br>
          <button type="submit" class="btn btn-success">Change Password</button>&nbsp;<span class="success"><?php if (isset($_GET['success'])) {echo $_GET['success'];} ?></span>
        </form>
      </div>
    </div>
  </div>
</body>
</html>