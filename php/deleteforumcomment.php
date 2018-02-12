<?php
require_once 'classes/DB.php';
require_once 'classes/CommentTable.php';
require_once 'classes/Comment.php';

$errors = array();

if (isset($_GET["id"]) && $_GET["id"] !== "") {
    $id = $_GET["id"];
}
else {
    $errors['commentId'] = "Id is required";
}

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new CommentTable($conn);
        $comment = $table->findCommentById($id);
        if ($comment != null) {
            $table->delete($id);
            header("Location: ../adminforumtopic.php?id=" . $comment->getTopicId());
        }
        else {
            $errors['id'] = "Comment not found";
            require "../index.php";
        }

    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    require "../index.php";
}
?>