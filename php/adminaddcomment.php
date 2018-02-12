<?php
require_once 'classes/DB.php';
require_once 'classes/CommentTable.php';
require_once 'classes/Comment.php';

$errors = array();

if (isset($_POST['commentText']) && $_POST['commentText'] !== "") {
    $commentText = $_POST["commentText"];
}
else {
    $errors['commentText'] = "Comment text must not be empty";
}

$topicId = $_POST["topicId"];

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new CommentTable($conn);
        $comment = new Comment(-1, $commentText, $topicId);
        $commentId = $table->insert($comment);
        $comment->setCommentId($commentId);

        //require "index.php";
        header("Location: ../adminforumtopic.php?id=".$topicId);
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    require "index.php";
}
?>
