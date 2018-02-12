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

try {
    ini_set("display_errors", 1);

    $conn = DB::getConnection();
    $table = new TopicTable($conn);
    $topics = $table->findAll();
}

catch (PDOException $e) {
    $conn = null;
    exit("Connection failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'header.php';
    ?>
    <title>Forum</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="forummain" class="col-md-offset-1 col-md-10">
            <div id="forumsearch" class="panel-info">
              <div class="panel-heading"><b>Search Forum</b></div>
              <div class="panel-body">
                <div id="articlesearchform">
                  <script type="text/javascript" src="js/jquery.min.js"></script>
                  <script type="text/javascript" src="js/searchforum.js"></script>
                  <b>Search Forum Questions&nbsp;&nbsp;</b><input id="forumsearchbox" name="forumsearchbox" type="text"/>&nbsp;
                  <input type="submit" name="submit" id="submit" value="Search Forum" class="btn btn-success" onclick="searchforum(forumsearchbox.value)"/>
                  &nbsp;<a href="forumaddtopic.php"><input id="forumcreatetopic" value="Create New Topic" class="btn btn-primary"/></a>
              </div>
              <div id="articlesearchresults">
                  <div id="articlesearchresultstitle">
                    <h3>Search Results</h3>
                </div>
                <div id="searchresultdata">

                </div>
            </div>
        </div>
    </div></br></br></br>
    <div id="forumlist" class="panel-info">
        <div class="panel-heading"><b>Latest Forum Posts</b></div>
        <div class="panel-body">
            <?php
            echo '<div id="topic-table">';
            echo '<table>';
            foreach ($topics as $topic) {
                echo '<tr>';
                echo '<td>'.'<a href="forumtopic.php?id='.$topic->getTopicId().'">'.$topic->getTopicTitle().'</a>'.'</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            ?>
        </div>
    </div> 
</div> 
</div>
</body>
</html>
