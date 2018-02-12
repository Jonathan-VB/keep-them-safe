<?php
session_start();

if ($_SESSION['role'] != "Admin") {
    header("Location: noaccess.php");
}

require_once 'php/dbconnect.php';
require_once 'php/classes/DB.php';
require_once 'php/classes/TopicTable.php';
require_once 'php/classes/Topic.php';
require_once 'php/classes/CommentTable.php';
require_once 'php/classes/Comment.php';

try {
    ini_set("display_errors", 1);

    $id = $_REQUEST['id'];

    $conn = DB::getConnection();

    $TopicTable = new TopicTable($conn);
    $topic = $TopicTable->findByTopicId($id);

    $CommentTable = new CommentTable($conn);
    $comments = $CommentTable->findById($id);
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
    <title>Admin - Forum Topic</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="forumtopicmain" class="col-md-offset-2 col-md-8">
            <div id="viewforumpost">
                <h3><?php echo $topic->getTopicTitle();?></h3></br>
                <b>Date Created:</b> <?php echo $topic->getTopicDateCreated();?></br></br>
                <?php echo $topic->getTopicContent();?>
            </div>
            <div id="viewforumpostcomments">
                <h4>Comments</h4>
                <?php foreach ($comments as $comment) {echo '<div id="viewforumpostcommentscomment">'.$comment->getCommentText().'&nbsp;&nbsp'.'<a href="php/deleteforumcomment.php?id='.$comment->getCommentId().'">Delete</a>'.'</div>';}?>
            </div>
            <div id="viewforumpostaddcomment">
                <form action="php/adminaddcomment.php" method="post">
                    <textarea type="text" class="form-control" name="commentText" cols="50" rows="3"></textarea></br><input id="viewforumpostaddcommentsubmit" type="submit" value="Comment" class="btn btn-success"/>&nbsp;&nbsp;<a href="adminforum.php"><input id="forumtopicreturnbutton" value="Return" class="btn btn-primary"/></a>
                    <input type="hidden" name="topicId" value="<?php if (isset($_REQUEST) && isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>" />
                </form>
                <form action="php/deleteforumtopic.php" method="POST">
                </br><input type="submit" value="Delete Topic" class="btn btn-danger"/>
                <input type="hidden" name="topicId" value="<?php if (isset($_REQUEST) && isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>" />
            </form>
        </div>
    </div>
</div>
</body>
</html>