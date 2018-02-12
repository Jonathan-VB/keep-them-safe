<?php
require_once 'php/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Login</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="loginformbig">
     <div id="reloginform" class="col-md-offset-3 col-md-6">
      <form action="php/loginaction.php" method="POST">
        <h3>Login</h3></br></br> 
        <label>Username</label></br>
        <input name="email" id="loginemail" type="email" class="form-control" placeholder="Enter Email"/>
        <span class="error"><?php if (isset($_GET['username'])) {echo $_GET['username'];} ?></span></br></br>

        <label>Password</label></br>
        <input name="password" id="loginpassword" type="password" class="form-control" placeholder="Enter Password"/>
        <span class="error"><?php if (isset($_GET['password'])) {echo $_GET['password'];} ?></span></br></br>

        <button type="submit" class="btn btn-success">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="registerform.php" class="btn btn-primary">Register</a>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>