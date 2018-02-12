<?php
	require_once 'dbconnect.php';
    //Sorts users by role and then id
	$query = mysql_query("SELECT * FROM users ORDER BY role");
    $numrows = mysql_num_rows($query);

    if ($numrows != 0) {
        while ($row = mysql_fetch_assoc($query)) {
            $dbid = $row['id'];
            $dbrole = $row['role'];
            $dbfname = $row['fname'];
            $dblname = $row['lname'];
            $dbemail = $row['email'];
            $dblocation = $row['location'];
            $dbgender = $row['gender'];
            $dbdob = $row['dob'];
            echo "<tr>";
            echo "<td>".$dbid."</td>";
            echo "<td>".$dbrole."</td>";
            echo "<td>".$dbfname."</td>";
            echo "<td>".$dblname."</td>";
            echo "<td>".$dbemail."</td>";
            //options to change user priviliges 
            echo "<td><a href='php/makeuserdefault.php?id=$dbid'>Make Default User</a></td>";
            echo "<td><a href='php/makeusercontentcreator.php?id=$dbid'>Make Content Creator</a></td>";
            echo "<td><a href='php/makeuseradmin.php?id=$dbid'>Make Admin</a></td>";
            echo "<td><a href='php/deleteuser.php?id=$dbid'>Delete User</a></td>";
            echo "</tr>";
      	}
    }
    else{
        echo "<tr>";
        echo "<td><b>No Users to show</b></td>";
        echo "</tr>";
    }
?>    	