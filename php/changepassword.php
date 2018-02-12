<?php
session_start();
//get the email from the session
$sessionemail = $_SESSION['email'];
//read in data from form and store as variables
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$confirmnewpassword = $_POST['confirmnewpassword'];

//if there is a sesion email enter
if (isset($sessionemail)) {
    require_once 'dbconnect.php';
    //get the user details
    $query = mysql_query("SELECT * FROM users WHERE email='$sessionemail'");
    //make sure the user exists
    $numrows = mysql_num_rows($query);

    if ($numrows != 0) {
        //fetch some details from the row to do some matching with
        while ($row = mysql_fetch_assoc($query)) {
            $dbid = $row['id'];
            $dbemail = $row['email'];
            $dbpassword = $row['password'];
            //if old password entered = hashed password in db
            if (md5($oldpassword) == $dbpassword) {
                
                //if user has entered new unmatching passwords
                if ($newpassword != $confirmnewpassword || $newpassword == ''){
                    header("Location:../changepasswordform.php?error2=New passwords don't match"); 
                }
                //change the password
                else{
                    $newuserpassword = md5($newpassword);
                    mysql_query("UPDATE users SET password='".$newuserpassword."'WHERE id='".$dbid."'");
                    header("Location:../changepasswordform.php?success=Password Successfully Changed!");
                }
            }
            else{
                header("Location:../changepasswordform.php?error1=That does not match your old password");  
            }
        }
    }
}
?>


                     