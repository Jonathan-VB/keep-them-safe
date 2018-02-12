<?php
session_start();

if ($_SESSION['role'] != "Admin") {
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
    <title>Admin Forum</title>
</head>
<body>
 <?php
 include 'navbar.php'
 ?>
 <div class="container">
    <div id="adminforummain" class="col-md-offset-1 col-md-10">
        <div id="forumsearch" class="panel-info ">
          <div class="panel-heading"><b>Search Forum</b></div>
          <div class="panel-body">
            <div id="articlesearchform">
              <script type="text/javascript" src="js/jquery.min.js"></script>
              <script type="text/javascript" src="js/adminsearchforum.js"></script>
              <b>Search Forum Questions&nbsp;&nbsp;</b><input id="forumsearchbox" name="forumsearchbox" type="text" size="50"/>&nbsp;
              <input type="submit" name="submit" id="submit" value="Search Forum" class="btn btn-success" onclick="adminsearchforum(forumsearchbox.value)"/>
          </div>
          <div id="articlesearchresults">
              <div id="articlesearchresultstitle">
                <h3>Search Results</h3>
            </div>
            <div id="adminsearchresultdata">

            </div>
        </div>
    </div>
</div>
<div id="adminforumlist" class="panel-info">
    <div class="panel-heading"><b>Latest Forum Posts</b></div>
    <div class="panel-body">
        <?php
        echo '<div id="topic-table">';
        echo '<table>';
        foreach ($topics as $topic) {
            echo '<tr>';
            echo '<td>'.'<a href="adminforumtopic.php?id='.$topic->getTopicId().'">'.$topic->getTopicTitle().'</a>'.'</td>';
            echo ' <td id="adminforumspacer">'.'</td>';
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
