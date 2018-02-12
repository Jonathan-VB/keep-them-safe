<?php

session_start();
require_once 'dbconnect.php';
//store data from form in variables
$email = $_POST['email'];
$password = $_POST['password'];
$incorrectpassword = "This password is incorrect";
$nousername = "This email is associated with an account";

if ($email !== "" && $password !== "" ) {

    $query = mysql_query("SELECT * FROM users WHERE email='$email'");
    $numrows = mysql_num_rows($query);

    if ($numrows != 0) {
        while ($row = mysql_fetch_assoc($query)) {
            $dbid = $row['id'];
            $dbrole = $row['role'];
            $dbfname = $row['fname'];
            $dblname = $row['lname'];
            $dbemail = $row['email'];
            $dbpassword = $row['password'];
            $dbgender = $row['gender'];
            $dbdob = $row['dob'];
            $dblocation = $row['location'];

            if ($email == $dbemail && md5($password) == $dbpassword) {
                //store details in session
                $_SESSION ['id'] = $dbid;
                $_SESSION ['role'] = $dbrole;
                $_SESSION ['fname'] = $dbfname;
                $_SESSION ['lname'] = $dblname;
                $_SESSION ['email'] = $dbemail;
                $_SESSION ['password'] = $dbpassword;
                $_SESSION ['gender'] = $dbgender;
                $_SESSION ['dob'] = $dbdob;
                $_SESSION ['location'] = $dblocation;
                header("Location:../index.php");   
            }
            
            else{
                header("Location:../loginformbig.php?password=Incorrect Password Entered");
            }
        }
    }
    else{
        header("Location:../loginformbig.php?username=Username Does Not Exist");
    }
}

elseif ($email !="" && $password == "") {
    header("Location:../loginformbig.php?password=Incorrect Password Entered");
}

elseif ($email == "" && $password == "") {
    header("Location:../loginformbig.php?username=No Username Entered&password=No Password Entered");
}

?>