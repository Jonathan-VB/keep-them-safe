<?php
require_once 'php/dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>Contact Us Submissions</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="contactmain" class="col-md-offset-1 col-md-10">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>  
          <?php
          $query = mysql_query("SELECT * FROM `contact` ORDER BY `id` DESC ");
          while($row = mysql_fetch_assoc($query)) {
            $contactId = $row['id'];
            $contactName = $row['name'];
            $contactEmail = $row['email'];
            $contactMessage = $row['message'];
            if ($row == null) {
              echo "No New Messages";
            }
            else{
              echo "<tr>"."<td>".$contactName."</td>"."<td>".$contactEmail."</td>"."<td>".$contactMessage."</td>"."<td>"."<a href=php/deletecontactformentry.php?id=$contactId>Delete Message</a>"."</td>"."</tr>";
            }
          }
          ?>
        </tbody> 
      </table>
    </div>
  </div>
</body>
</html>