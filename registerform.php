
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Registration Form</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="regestrationmain">
      <div id="registrationform" class="col-md-offset-3 col-md-6">
        <form action="register.php" method="POST">
          <h3>Register New Account</h3></br></br> 
          <label>First Name</label></br> 
          <input class="form-control" type="text" name="fname" value="<?php if (isset($firstname)) echo $firstname; ?>" />
          <span class="error"><?php if (isset($errors['fname'])) echo $errors['fname']; ?></span>
        </br></br>
        
        <label>Last Name</label></br> 
        <input class="form-control" type="text" name="lname" value="<?php if (isset($lastname)) echo $lastname; ?>" />
        <span class="error"><?php if (isset($errors['lname'])) echo $errors['lname']; ?></span>
      </br></br>
      
      <label>Email</label></br> 
      <input class="form-control" type="text" name="email" value="<?php if (isset($email)) echo $email; ?>" />
      <span class="error"><?php if (isset($errors['email'])) echo $errors['email']; ?></span>
    </br></br>
    
    <label>Password</label></br> 
    <input class="form-control" type="password" name="password" value="" />
    <span class="error"><?php if (isset($errors['password'])) echo $errors['password']; ?></span>
  </br></br>
  
  <label>Confirm Password</label></br> 
  <input class="form-control" type="password"  name="confirmpassword" value="" />
  <span class="error"><?php if (isset($errors['confirmpassword'])) echo $errors['confirmpassword']; ?></span>
</br></br>

<label>Gender</label></br>
<select name="gender" class="form-control"  value="<?php if (isset($location)) echo $location; ?>" />
  <option value="male">Male</option>
  <option value="female">Female</option>
</select>
<span class="error"><?php if (isset($errors['gender'])) echo $errors['gender']; ?></span>
</br></br>

<label>Date of Birth (DD/MM/YYYY)</label></br>
<input type="date" class="form-control" max="2005-01-02" min="1900-12-31"name="dob" value="<?php if (isset($dob)) echo $dob; ?>" />
<span class="error"><?php if (isset($errors['dob'])) echo $errors['dob']; ?></span>
</br></br>

<label>Location</br></label>
<select name="location" class="form-control"  value="<?php if (isset($location)) echo $location; ?>" />
  <?php require 'php/countries.php'; ?>
</select>	
<span class="error"><?php if (isset($errors['location'])) echo $errors['location']; ?></span></br></br>
<input class="btn btn-primary" type="submit" name="submit" value="Create Account"/>
</form>
</div>
</div>
</div>
</body>
</html>
