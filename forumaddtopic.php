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
require_once 'php/classes/DB.php';
require_once 'php/classes/TopicTable.php';
require_once 'php/classes/Topic.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'header.php';
    ?>
    <title>New Forum Topic</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="viewusersmain">
            <div id="forumadd" class="col-md-offset-2 col-md-8 ">
                <div><b>Create New Forum Topic</b></div>
                <div id="addforumtopicform">
                    <form action="php/addtopic.php" method="post">
                        <label>Topic Title</label></br>
                        <input type="text" name="topicTitle" class="form-control"/></br></br>

                        <label>Topic Body</label></br>
                        <textarea type="text" name="topicContent" class="form-control" rows="5"></textarea></br></br>

                        <input type="submit" class="btn btn-success" value="Create Topic" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

