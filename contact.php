<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Contact Us</title>
</head>
<body>
 <?php
 include 'navbar.php'
 ?>
 <div class="container">
  <div id="contactmain" class="spacer col-md-offset-3 col-md-6">
    <form method="POST" action="php/contactform.php">
      <h3>Contact Form</h3></br></br>
      <label>Name</label></br>
      <input id="name" name="name" class="form-control">
      <span class="error"><?php if (isset($_GET['name'])) {echo $_GET['name'];} ?></span></br></br>
      <label>Email</label></br>
      <input id="email" name="email" class="form-control">
      <span class="error"><?php if (isset($_GET['email'])) {echo $_GET['email'];} ?></span>
      <span class="error"><?php if (isset($_GET['bademail'])) {echo $_GET['bademail'];} ?></span></br></br>
      <label>Message</label></br>
      <textarea id=" message"name="message" class="form-control" rows='6'></textarea>
      <span class="error"><?php if (isset($_GET['message'])) {echo $_GET['message'];} ?></span></br></br>
      <input type="submit" class="btn btn-success" value="Send Message"/>&nbsp;<span class="success"><?php if (isset($_GET['success'])) {echo $_GET['success'];} ?></span>
    </form>
  </div>
</div>
</body>
</html>