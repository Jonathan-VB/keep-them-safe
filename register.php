<?php
	require_once 'php/dbconnect.php';
	require_once 'php/classes/User.php';
	require_once 'php/classes/UserTable.php';
	require_once 'php/classes/DB.php';
// try to register the user - if there are any error/
// exception, catch it and send the user back to the
// login form with an error message
try {
    $errors = array();

    // throw an exception if any of the form fields 
    // are empty
	if (empty($_POST['fname'])) {
        //throw new Exception("First Name required");
        $errors['fname'] = "First Name required";
    }
    if (empty($_POST['lname'])) {
        //throw new Exception("Last Name required");
        $errors['lname'] = "Last Name required";
    }
    if (empty($_POST['email'])) {
        //throw new Exception("Email required");
        $errors['email'] = "Email required";
    }
    if (empty($_POST['password'])) {
        //throw new Exception("Password required");
        $errors['password'] = "Password required";
    }
    if (empty($_POST['confirmpassword'])) {
        //throw new Exception("Confirm password required");
        $errors['cconfirmpassword'] = "Confirm password required";
    }
    if (empty($_POST['gender'])) {
        //throw new Exception("Gender required");
        $errors['gender'] = "Gender required";
    }
	if (empty($_POST['dob'])) {
        //throw new Exception("Date of Birth required");
        $errors['dob'] = "Date of Birth required";
    }
    if (empty($_POST['location'])) {
        //throw new Exception("Location required");
        $errors['location'] = "Location required";
    }
    if (empty($errors)) {
		$role = "User";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$location = $_POST['location'];
	
		if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Invalid email format"; 
		}	
		if (!empty($fname) && !preg_match("/^[a-zA-Z ]*$/",$fname)) {
			$errors['fname'] = "Only letters and white space allowed"; 
		}
		if (!empty($fname) && strlen($fname) > 29) {
			$errors['fname'] = "Too many characters"; 
		}
		if (!empty($lname) && !preg_match("/^[a-zA-Z ]*$/",$lname)) {
			$errors['lname'] = "Only letters and white space allowed"; 
		}
		if (!empty($lname) && strlen($lname) > 39) {
			$errors['lname'] = "Too many characters"; 
		}
		
		// if the password fields do not match 
        // then throw an exception
        if (!empty($password) && !empty($confirmpassword) && $password != $confirmpassword) {
            //throw new Exception("Passwords must match");
            $errors['password'] = "Passwords must match";
        }
		
		$connection = DB::getConnection();
        $userTable = new UserTable($connection);
		
        $user = $userTable->getUserByEmail($email);

        // since password fields match, see if the username
        // has already been registered - if it is then throw
        // and exception
        if ($user != null) {
            $errors['email'] = "Email already registered";
        }			
	}
	if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
	}
	if ($password == $confirmpassword) {
		$password = md5($password);
		mysql_query("INSERT INTO `users` VALUE ('','$role','$fname','$lname','$email','$password','$gender','$dob','$location')");
		header("Location:confirmregestration.php");
	}
}
catch (Exception $ex) {
    // if an exception occurs then extract the message
    // from the exception and send the user the
    // registration form
    $errorMessage = $ex->getMessage();
	//header("Location:../registerform.php");
	require 'registerform.php';
}
?>